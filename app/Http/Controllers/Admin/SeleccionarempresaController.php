<?php

namespace App\Http\Controllers\Admin;

// use App\Empresa;
use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SeleccionarempresaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function seleccionarempresa () {

        $empresas = Empresa::get();

      
        if( count( $empresas ) == 0){
            if ( auth()->user()->hasRole('SuperAdministrador') ) {
                return redirect()->route('empresas.index')->with('info', 'Por favor active una empresa antes de continuar');
            }
            else{
        		return view('includes.sinempresas');
            }
        }else if( count( $empresas ) == 1 ){
            $empresa = $empresas->first();
            
            if ( auth()->user()->hasRole('SuperAdministrador') ) {
                Session::put( 'empresaactual', $empresa->id );
                Session::put( 'empresadescripcion', $empresa->nombre );
                
                return redirect()->route('config.seleccionar.periodo');
            }
            else{
        		 $tempresas = Empresa::whereHas('usuarios', function ($query) {
                         $query->where( 'user_id', '=', auth()->user()->id );
                     })
                     ->where( 'id', '=', $empresa->id )
                     ->count();

                     if( $tempresas == 0 ){
                        return view('includes.sinempresas');
                     }else{
                        Session::put( 'empresaactual', $empresa->id );
                        Session::put( 'empresadescripcion', $empresa->nombre );
                        
                        return redirect()->route('config.seleccionar.periodo');
                     }
            }

        }else if( count( $empresas ) > 1 ){
           
            if ( auth()->user()->hasRole('SuperAdministrador') ){
                    return view('encuestas.paginas.formseleccionarempresa', compact('empresas') );                     
            }else{
                $empresas = Empresa::whereHas('usuarios', function ($query) {
                    $query->where( 'user_id', '=', auth()->user()->id );
                })->get();

                if( count($empresas) == 1){
                    $empresa = $empresas->first();
                    Session::put( 'empresaactual', $empresa->id );
                    Session::put( 'empresadescripcion', $empresa->nombre );
                    return redirect()->route('config.seleccionar.periodo');
                }else{

                    return view('encuestas.paginas.formseleccionarempresa', compact('empresas') );  
                }
                
            } 
        }
        
    }


    public function establecerempresa(Request $request)
    {        
        $empresa = Empresa::findOrFail($request->empresaid);        

        Session::put( 'empresaactual', $empresa->id );
        Session::put( 'empresadescripcion', $empresa->nombre );

        return response()->json(['success', $empresa ],200 );

    }

}

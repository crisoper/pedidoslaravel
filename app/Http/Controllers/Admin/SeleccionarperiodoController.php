<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Encuestas\EstablecerperiodoRequest;
use App\Models\Encuestas\Administracion\Periodos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeleccionarperiodoController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
    }


    public function seleccionarperiodo() {
    
        $periodos = Periodos::where("inicio", '<=', now() )
        ->where("fin", '>=', now() )
        ->where('estado', 1)
        ->where('empresa_id', $this->empresaId() )
        ->get();
        
        if ( count($periodos)  == 0 ) {
            if ( auth()->user()->hasRole('SuperAdministrador') ) {
                return view('layouts.paginas.mensajes.sinperiodos');                
            }
            else{
        		return view('encuestas.paginas.mensajes.sinperiodosactivos');
            }

        }
        else if( count($periodos)  == 1 ){


            $periodo = $periodos->first();
            if ( auth()->user()->hasRole('SuperAdministrador') ) {
                Session::put( 'periodoactual', $periodo->id );
                Session::put( 'periododescripcion', $periodo->nombre );
                
                return redirect()->route('home');
            }
            else{
        		 $tperiodos = Periodos::whereHas('usuarios', function ($query) {
                         $query->where( 'user_id', '=', auth()->user()->id );
                     })
                     ->where( 'id', '=', $periodo->id )
                     ->count();

                     if( $tperiodos == 0 ){
                        return view('encuestas.paginas.mensajes.sinperiodosactivos');
                     }else{
                        Session::put( 'periodoactual', $periodo->id );
                        Session::put( 'periododescripcion', $periodo->nombre );
                        
                        return redirect()->route('home');
                     }
            }
            
        }
        else if ( count($periodos)  > 1 ) {
            if ( auth()->user()->hasRole('SuperAdministrador') ){
                    return view('encuestas.paginas.formseleccionarperiodo', compact('periodos') );                     
            }
            else {
                $periodos = Periodos::whereHas('usuarios', function ($query) {
                    $query->where( 'user_id', '=', auth()->user()->id );
                })->get();


                if ( count( $periodos ) == 1 ) {
                   
                    $periodo = $periodos->first();

                    Session::put( 'periodoactual', $periodo->id );
                    Session::put( 'periododescripcion', $periodo->nombre );
                    
                    return redirect()->route('home');
                }
                else if (count( $periodos ) > 1 )  {
                    return view('encuestas.paginas.formseleccionarperiodo', compact('periodos') );  
                }
                else {
                    return view('encuestas.paginas.mensajes.sinperiodosactivos');
                }

            } 
        }
   
    }


    public function establecerperiodo(Request $request)
    {
       
    	$periodo = Periodos::findOrFail( $request->periodoid );
    
    	Session::put( 'periodoactual', $periodo->id );
        Session::put( 'periododescripcion', $periodo->nombre );
      
        return response()->json(['success', $periodo ],200 );

    }
    


}

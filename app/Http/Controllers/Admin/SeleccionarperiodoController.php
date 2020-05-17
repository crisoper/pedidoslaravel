<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Periodo;
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
    
        $periodos = Periodo::where("inicio", '<=', now() )
        ->where("fin", '>=', now() )
        ->where('estado', 1)
        ->where('empresa_id', $this->empresaId() )
        ->get();
        
        if ( count($periodos)  == 0 ) {
            if ( auth()->user()->hasRole('SuperAdministrador') ) {
                return redirect()->route('periodos.index')->with('info', 'Por favor active un periodo antes de continuar');         
            }
            else{
        		return view('includes.sinperiodosactivos');
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
        		 $tperiodos = Periodo::whereHas('usuarios', function ($query) {
                         $query->where( 'user_id', '=', auth()->user()->id );
                     })
                     ->where( 'id', '=', $periodo->id )
                     ->count();

                     if( $tperiodos == 0 ){
                        return view('includes.sinperiodosactivos');
                     }else{
                        Session::put( 'periodoactual', $periodo->id );
                        Session::put( 'periododescripcion', $periodo->nombre );
                        
                        return redirect()->route('home');
                     }
            }
            
        }
        else if ( count($periodos)  > 1 ) {
            if ( auth()->user()->hasRole('SuperAdministrador') ){
                    return view('admin.periodos.formseleccionarperiodo', compact('periodos') );                     
            }
            else {
                $periodos = Periodo::whereHas('usuarios', function ($query) {
                    $query->where( 'user_id', '=', auth()->user()->id );
                })->get();


                if ( count( $periodos ) == 1 ) {
                   
                    $periodo = $periodos->first();

                    Session::put( 'periodoactual', $periodo->id );
                    Session::put( 'periododescripcion', $periodo->nombre );
                    
                    return redirect()->route('home');
                }
                else if (count( $periodos ) > 1 )  {
                    return view('admin.periodos.formseleccionarperiodo', compact('periodos') );  
                }
                else {
                    return view('includes.sinperiodosactivos');
                }

            } 
        }
   
    }


    public function establecerperiodo(Request $request)
    {
       
    	$periodo = Periodo::findOrFail( $request->periodoid );
    
    	Session::put( 'periodoactual', $periodo->id );
        Session::put( 'periododescripcion', $periodo->nombre );
      
        return response()->json(['success', $periodo ],200 );

    }
    


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use App\Models\Publico\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
    }

    public function index()
    {
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        $empresaid = $this->empresaId();
        return view('admin.configuracion.empresa.horarios.index', compact('empresaid','dias'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        $diasNoValidosInicio = array();
        $diasNoValidosFin = array();



        if (count($diasNoValidosInicio) > 0 || count($diasNoValidosFin) > 0) {
            return response()->json([
                'error' =>  [
                    'message' => 'Por favor complete hora unicio y hora fin de manera correcta',
                    'data' => [
                        "inicio" => $diasNoValidosInicio,
                        "fin" => $diasNoValidosFin,
                    ]
                ]
            ], 429);
        }           
       
        if ( isset( $request->dias )  ) {
  
            for ($i = 0; $i <= count($dias); $i++) { 

                if (  isset($request->dias[$i ])  ) {
               
                    $horario = new Horario();
                    $horario->empresa_id = $request->empresaid;
                    $horario->dia =  $dias[$i - 1];
                    $horario->horainicio =trim( $request->horainicio[$i] ) ;
                    $horario->horafin = trim( $request->horafin[$i] ) ;
                    $horario->updated_by = Auth()->user()->id;
                    $horario->save();
               
                }
             }
        
            
        }else{
            return response()->json('Seleccione minimo un día de la semana',500);
           
        }

        return response()->json('Datos guardados correcctamente',200);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
          
        $diahorario = Horario::where('empresa_id', $this->empresaId() )->get();
        $diasenhorario=[];
        $empresaid = $this->empresaId();
        foreach( $diahorario as $dia ){
            array_push($diasenhorario , $dia->dia);           
        }       
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        
        return view('admin.configuracion.empresa.horarios.editar', compact('dias', 'diasenhorario','empresaid','diahorario'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        $diasNoValidosInicio = array();
        $diasNoValidosFin = array();



        if (count($diasNoValidosInicio) > 0 || count($diasNoValidosFin) > 0) {
            return response()->json([
                'error' =>  [
                    'message' => 'Por favor complete hora unicio y hora fin de manera correcta',
                    'data' => [
                        "inicio" => $diasNoValidosInicio,
                        "fin" => $diasNoValidosFin,
                    ]
                ]
            ], 429);
        }           
       
        if ( isset( $request->dias )  ) {
            $deletehorarios = Horario::where('empresa_id' ,  $request->empresaid )->get();
            foreach( $deletehorarios as $horariodelete){
                $horariodelete->delete();
            }

            for ($i = 0; $i <= count($dias); $i++) { 

                if (  isset($request->dias[$i ])  ) {
               
                    $horario = new Horario();
                    $horario->empresa_id = $request->empresaid;
                    $horario->dia =  $dias[$i - 1];
                    $horario->horainicio =trim( $request->horainicio[$i] ) ;
                    $horario->horafin = trim( $request->horafin[$i] ) ;
                    $horario->updated_by = Auth()->user()->id;
                    $horario->save();
               
                }
             }
        
            
        }else{
            return response()->json('Seleccione minimo un día de la semana',500);
           
        }

        return response()->json('Datos guardados correcctamente',200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 

}

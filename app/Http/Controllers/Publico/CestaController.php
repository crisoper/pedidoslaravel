<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\CestaResource;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $cestas = Cesta::where("storagecliente_id", $request->storagecliente_id)
        ->where("tipo", $request->tipo)
        ->get();

        return CestaResource::collection( $cestas ) ;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cesta = Cesta::where("storagecliente_id", $request->storagecliente_id)
        ->where( "producto_id", $request->producto_id )
        ->where( "tipo", $request->tipo )
        ->first();

        if ( $cesta ) {
            $cesta->delete();
            return response()->json(['success' => "Operacion realizada con exito"], 200);
        }
        
        return response()->json(['error' => "No se ha encontrado el recurso"], 404);
        
    }
}
<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ListadeseoResource;
use App\Models\Publico\Cesta;
// use App\Models\Publico\Listadeseo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListadeseosMenuController extends Controller
{
    public function index( Request $request )
    {
        $listadeseos = Cesta::where("storagecliente_id", $request->storagecliente_id)
        ->where("tipo", $request->tipo)
        ->get();

        return ListadeseoResource::collection( $listadeseos ) ;
    }



    public function store(Request $request)
    {
        
        $listadeseo = Cesta::where("storagecliente_id", $request->storagecliente_id )
        ->where("producto_id", $request->producto_id )
        ->where("tipo", $request->tipo )
        ->first();

        if ( !$listadeseo ) {
            $listadeseo = new Cesta();
        }
        $listadeseo->storagecliente_id = $request->storagecliente_id;
        $listadeseo->producto_id = $request->producto_id;
        $listadeseo->cantidad = 1;
        $listadeseo->tipo = $request->tipo;
        
        if ( Auth::guard('api')->check() ) {
            $listadeseo->cliente_id = Auth::id();
        }
        else {
            $listadeseo->cliente_id = Auth::id();
        }

        $listadeseo->save();

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }
    
    
    
    public function delete(Request $request)
    {
        $listadeseo = Cesta::where("storagecliente_id", $request->storagecliente_id)
        ->where( "producto_id", $request->producto_id )
        ->where( "tipo", $request->tipo )
        ->first();

        if ( $listadeseo ) {
            $listadeseo->delete();
            return response()->json(['success' => "Operacion realizada con exito"], 200);
        }
        
        return response()->json(['error' => "No se ha encontrado el recurso"], 404);
        
    }
}

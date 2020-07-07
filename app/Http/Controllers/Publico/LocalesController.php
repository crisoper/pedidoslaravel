<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Models\Admin\Empresa;
use App\Models\Publico\Cesta;
use App\Models\Admin\Producto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Publico\Pedidodetalle;
use App\Http\Resources\Publico\ProductoResource;

class LocalesController extends Controller
{
    
    public function index(Request $request, $idempresa )
    {
        $empresa = Empresa::where("id", $idempresa)
        ->with([
            "horarios",
        ])
        ->first();

        return view("publico.locales.index", compact("empresa"));
    }


    public function productos ( Request $request ) {
        

        $productoCestaIds = array();
        $productoDeseoIds = array();

        if ( $request->has("storagecliente_id") ) {
            $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "cesta")
            ->where("empresa_id", $request->input("empresa_id", 0) )
            ->get()
            ->pluck("producto_id");


            $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "deseos")
            ->where("empresa_id", $request->input("empresa_id", 0) )
            ->get()
            ->pluck("producto_id");
        }
        
        
        $productosxempresa = Producto::where("empresa_id", $request->input("empresa_id", 0) );

        if( $request->has('buscar')  and $request->buscar != "" ) {
            $productosxempresa = $productosxempresa->where('nombre', 'like', '%'.$request->buscar.'%');
        }

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosxempresa = $productosxempresa->whereDate( "created_at", now() );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            // $productosxempresa = $productosxempresa->whereDate( "created_at", now() );
        }


        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosxempresa = $productosxempresa->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosxempresa = $productosxempresa->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosxempresa = $productosxempresa->orderBy("precio", "asc");
        }

        $productosxempresa = $productosxempresa->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        foreach ( $productosxempresa as $producto ) {

            if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
                $producto->encarrito = true;
            }
            else {
                $producto->encarrito = false;
            }
            
            if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
                $producto->enlistadeseos = true;
            }
            else {
                $producto->enlistadeseos = false;
            }

        }

        return response()
        ->json(
            [
                'productosxempresa' => ProductoResource::collection( $productosxempresa ),
            ], 
            200
        );


    }

}

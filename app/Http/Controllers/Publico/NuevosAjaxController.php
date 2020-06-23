<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;

class NuevosAjaxController extends Controller
{
    public function index(Request $request)
    {
        $productoCestaIds = array();
        $productoDeseoIds = array();

        if ( $request->has("storagecliente_id") ) {
            $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "cesta")
            ->get()
            ->pluck("producto_id");


            $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
            ->where("tipo", "deseos")
            ->get()
            ->pluck("producto_id");
        }
        
        $productosNuevos = Producto::whereDate( "created_at", now() );

        if( $request->has('buscar')  and $request->buscar != "" ) {
            $productosNuevos = $productosNuevos->where('nombre', 'like', '%'.$request->buscar.'%');
        }
        
        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosNuevos = $productosNuevos->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosNuevos = $productosNuevos->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosNuevos = $productosNuevos->orderBy("precio", "asc");
        }

        $productosNuevos = $productosNuevos->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        foreach ( $productosNuevos as $producto ) {

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

        return ProductoResource::collection( $productosNuevos );
    }
}

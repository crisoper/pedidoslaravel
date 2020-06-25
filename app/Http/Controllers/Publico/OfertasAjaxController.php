<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;

class OfertasAjaxController extends Controller
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
        
        $productosOfertados = Producto::where( "stock", ">", 20 );

        if( $request->has('buscar')  and $request->buscar != "" ) {
            $productosOfertados = $productosOfertados->where('nombre', 'like', '%'.$request->buscar.'%');
        }
        
        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosOfertados = $productosOfertados->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosOfertados = $productosOfertados->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosOfertados = $productosOfertados->orderBy("precio", "asc");
        }

        $productosOfertados = $productosOfertados->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        foreach ( $productosOfertados as $producto ) {

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

        return ProductoResource::collection( $productosOfertados );
    }
}

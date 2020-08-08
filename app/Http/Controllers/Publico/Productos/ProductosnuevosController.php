<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductosnuevosController extends Controller
{
    public function index()
    {
        return view('publico.nuevos.index');
    }

    
    public function nuevos(Request $request)
    {
        // $productoCestaIds = array();
        // $productoDeseoIds = array();

        // if ( $request->has("storagecliente_id") ) {
        //     $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
        //     ->where("tipo", "cesta")
        //     ->get()
        //     ->pluck("producto_id");


        //     $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
        //     ->where("tipo", "deseos")
        //     ->get()
        //     ->pluck("producto_id");
        // }
        
        
        //Productos mas pedidos
        $hoynuevos =  Carbon::now();
        $fechainicionuevos = Carbon::now()->subDays( 7 );

        $productosNuevos = Producto::whereDate("created_at", ">=", $fechainicionuevos )
        ->whereDate("created_at", "<=", $hoynuevos );

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosNuevos = $productosNuevos->whereDate("created_at", ">=", $fechainicionuevos )
                ->whereDate("created_at", "<=", $hoynuevos );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            $productosNuevos = $productosNuevos->whereHas("oferta", function($query){
                $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
            });
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

        // foreach ( $productosNuevos as $producto ) {

        //     if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
        //         $producto->encarrito = true;
        //     }
        //     else {
        //         $producto->encarrito = false;
        //     }
            
        //     if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
        //         $producto->enlistadeseos = true;
        //     }
        //     else {
        //         $producto->enlistadeseos = false;
        //     }

        // }

        return ProductoResource::collection( $productosNuevos );
    }
}

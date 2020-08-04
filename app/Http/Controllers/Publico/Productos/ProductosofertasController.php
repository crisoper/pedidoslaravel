<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductosofertasController extends Controller
{
    public function index()
    {
        return view('publico.ofertas.index');
    }

    
    public function ofertas(Request $request)
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
        
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 7 );


        $productosOfertados = Producto::query();

        // if( $request->has('buscar')  and $request->buscar != "" ) {
        //     $productosOfertados = $productosOfertados->where('nombre', 'like', '%'.$request->buscar.'%');
        // }
        
        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosrecomendados = $productosOfertados->whereDate("created_at", ">=", $fechainicio )
                ->whereDate("created_at", "<=", $hoy );
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
        ->whereHas("oferta", function($query){
            $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
        })
        ->get();

        // foreach ( $productosOfertados as $producto ) {

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

        return ProductoResource::collection( $productosOfertados );
    }
}

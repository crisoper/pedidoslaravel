<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultadosproductosController extends Controller
{
    public function index( Request $request )
    {
        return view('publico.resultadosproductos.index');
    }
    
    

    public function productosbusqueda( Request $request )
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
        
        
        $hoynuevos =  Carbon::now();
        $fechainicionuevos = Carbon::now()->subDays( 7 );

        
        $productosresultados = Producto::query();

        if( $request->has('buscarproductos')  and $request->buscarproductos != "" ) {
            $productosresultados = $productosresultados->where('nombre', 'like', '%'.$request->buscarproductos.'%');
        }

        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosresultados = $productosresultados->whereDate("created_at", ">=", $fechainicionuevos )
                ->whereDate("created_at", "<=", $hoynuevos );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            $productosresultados = $productosresultados->whereHas("oferta", function($query){
                $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
            });
        }

        
        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosresultados = $productosresultados->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosresultados = $productosresultados->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosresultados = $productosresultados->orderBy("precio", "asc");
        }

        $productosresultados = $productosresultados->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        // foreach ( $productosresultados as $producto ) {

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

        return ProductoResource::collection( $productosresultados );
    }
}

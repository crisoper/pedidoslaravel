<?php

namespace App\Http\Controllers\Publico\Productos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Pedidos\Pedidodetalle;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosmaspedidosController extends Controller
{
    public function index()
    {
        return view('publico.maspedidos.index');
    }

    
    public function maspedidos(Request $request)
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
        
        //Productos mas pedidos
        $hoymaspedidos =  Carbon::now();
        $fechainiciomaspedidos = Carbon::now()->subDays( 30 );

        $productomaspedidosIds = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("productos.id",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->groupBy("productos.id" )
        ->orderBy("cantidad", "desc")
        ->whereDate("pedidodetalles.created_at", ">=", $fechainiciomaspedidos )
        ->whereDate("pedidodetalles.created_at", "<=", $hoymaspedidos )
        ->limit(10)
        ->pluck("id");



        $productosMasPedidos = Producto::where( "stock", ">", 0 );

        // if( $request->has('buscar')  and $request->buscar != "" ) {
        //     $productosMasPedidos = $productosMasPedidos->where('nombre', 'like', '%'.$request->buscar.'%');
        // }
        
        if( $request->has('filtro_nuevos')  and $request->filtro_nuevos == 1 ) {
            $productosMasPedidos = $productosMasPedidos->whereDate("created_at", ">=", $fechainicionuevos )
                ->whereDate("created_at", "<=", $hoynuevos );
        }
        
        if( $request->has('filtro_ofertas')  and $request->filtro_ofertas == 1 ) {
            $productosMasPedidos = $productosMasPedidos->whereHas("oferta", function($query){
                $query->whereDate('diainicio', "<=", now())->whereDate("diafin", ">=", now());
            });
        }

        if ( $request->has('filtro_orden')  and $request->filtro_orden == "ofertas" ) {
            $productosMasPedidos = $productosMasPedidos->orderBy("id", "asc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "mayor" ) {
            $productosMasPedidos = $productosMasPedidos->orderBy("precio", "desc");
        }
        elseif( $request->has('filtro_orden')  and $request->filtro_orden == "menor" ) {
            $productosMasPedidos = $productosMasPedidos->orderBy("precio", "asc");
        }

        $productosMasPedidos = $productosMasPedidos->whereIn("id", $productomaspedidosIds )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        // foreach ( $productosMasPedidos as $producto ) {

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

        return ProductoResource::collection( $productosMasPedidos );
    }
}

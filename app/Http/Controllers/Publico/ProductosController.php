<?php

namespace App\Http\Controllers\Publico;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Publico\Cesta;
use App\Models\Admin\Producto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Publico\Pedidodetalle;
use App\Http\Resources\Publico\ProductoResource;

class ProductosController extends Controller
{
    public function index( Request $request )
    {
        return view('publico.inicio.index');
    }

    


    
    //PRODUCTOS X AJAX

    public function recomendados(Request $request)
    {
        $productosrecomendados = Producto::whereDate( "created_at", "<", now()  )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        
        //Productos en oferta
        $productosoferta = Producto::where( "stock", ">", 20 )
        ->whereNotIn("id", $productosrecomendados->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();


        //Productos nuevos
        $productosnuevos = Producto::whereDate( "created_at", now() )
        ->whereNotIn("id", $productosrecomendados->pluck("id") )
        ->whereNotIn("id", $productosoferta->pluck("id") )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        

        //Productos mas pedidos
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 30 );

        $productomaspedidosIds = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("productos.id",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->groupBy("productos.id" )
        ->orderBy("cantidad", "desc")
        ->whereDate("pedidodetalles.created_at", ">=", $fechainicio )
        ->whereDate("pedidodetalles.created_at", "<=", $hoy )
        ->limit(10)
        ->pluck("id");


        $productosmaspedidos = Producto::where( "stock", "<", 10 )
        ->whereIn("id", $productomaspedidosIds )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        
        

        return response()
        ->json(
            [
                'recomendados' => ProductoResource::collection( $productosrecomendados ),
                'ofertas' => ProductoResource::collection( $productosoferta ),
                'nuevos' => ProductoResource::collection( $productosnuevos ),
                'maspedidos' => ProductoResource::collection( $productosmaspedidos )
            ], 
            200
        );

    }

    









    public function getdatosxid ( Request $request ) {
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

        $productoEnModal = Producto::where("id", $request->has("idproducto") ? $request->idproducto : 0 )
        ->with([
            "empresa",
            "categoria",
            "tags",
            "fotos",
        ])
        ->first();

        // foreach ( $productoEnModal as $producto ) {

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

        if ( $productoEnModal != null ) {
            return new ProductoResource (  $productoEnModal );
        }

        return "No se enncontro el producto";

    }


}

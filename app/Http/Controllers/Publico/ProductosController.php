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
        $productosrecomendados = Producto::whereDate("created_at", ">", 20 )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(8)
        ->get();


        $productosrecomendadosIds = $productosrecomendados->pluck("id");

        $productosofertas = Producto::whereDate("created_at", "<", now() )
        ->whereNotIn("id", $productosrecomendadosIds )
        ->with([
            "tags",
            "categoria",
            "fotos",
            // "fotos" => function( $queryFotos ) {
            //     $queryFotos->limit(2);
            // },
        ])
        ->paginate(8);
        
        $productosnuevos = Producto::whereDate("created_at", now() )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->paginate(8);
        
        $productosmaspedidos = Producto::where("stock", "<", 10 )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->paginate(8);
              
        return view('publico.inicio.index', compact('productosrecomendados', 'productosofertas', 'productosnuevos', 'productosmaspedidos'));
    }

    


    
    //PRODUCTOS X AJAX

    public function recomendados(Request $request)
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
        
        $productosrecomendados = Producto::whereDate( "created_at", "<", now()  )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        foreach ( $productosrecomendados as $producto ) {

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

        foreach ( $productosoferta as $producto ) {

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

        foreach ( $productosnuevos as $producto ) {

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

        foreach ( $productosmaspedidos as $producto ) {

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
                'recomendados' => ProductoResource::collection( $productosrecomendados ),
                'ofertas' => ProductoResource::collection( $productosoferta ),
                'nuevos' => ProductoResource::collection( $productosnuevos ),
                'maspedidos' => ProductoResource::collection( $productosmaspedidos )
            ], 
            200
        );

    }

    
    // public function ofertas(Request $request)
    // {


    //     $productoCestaIds = array();
    //     $productoDeseoIds = array();

    //     if ( $request->has("storagecliente_id") ) {
    //         $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "cesta")
    //         ->get()
    //         ->pluck("producto_id");


    //         $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "deseos")
    //         ->get()
    //         ->pluck("producto_id");
    //     }
        
    //     $productosofertados = Producto::where( "stock", ">", 20 )
    //     ->with([
    //         "empresa",
    //         "tags",
    //         "categoria",
    //         "fotos",
    //     ])
    //     ->limit(10)
    //     ->get();

    //     foreach ( $productosofertados as $producto ) {

    //         if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
    //             $producto->encarrito = true;
    //         }
    //         else {
    //             $producto->encarrito = false;
    //         }
            
    //         if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
    //             $producto->enlistadeseos = true;
    //         }
    //         else {
    //             $producto->enlistadeseos = false;
    //         }

    //     }

    //     return ProductoResource::collection( $productosofertados );

    // }

    
    // public function nuevos(Request $request)
    // {
    //     $productoCestaIds = array();
    //     $productoDeseoIds = array();

    //     if ( $request->has("storagecliente_id") ) {
    //         $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "cesta")
    //         ->get()
    //         ->pluck("producto_id");


    //         $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "deseos")
    //         ->get()
    //         ->pluck("producto_id");
    //     }
        
    //     $productosnuevos = Producto::whereDate( "created_at", now() )
    //     ->with([
    //         "empresa",
    //         "tags",
    //         "categoria",
    //         "fotos",
    //     ])
    //     ->limit(10)
    //     ->get();

    //     foreach ( $productosnuevos as $producto ) {

    //         if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
    //             $producto->encarrito = true;
    //         }
    //         else {
    //             $producto->encarrito = false;
    //         }
            
    //         if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
    //             $producto->enlistadeseos = true;
    //         }
    //         else {
    //             $producto->enlistadeseos = false;
    //         }

    //     }

    //     return ProductoResource::collection( $productosnuevos );

    // }

    
    // public function maspedidos(Request $request)
    // {
    //     $productoCestaIds = array();
    //     $productoDeseoIds = array();

    //     if ( $request->has("storagecliente_id") ) {
    //         $productoCestaIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "cesta")
    //         ->get()
    //         ->pluck("producto_id");


    //         $productoDeseoIds = Cesta::where("storagecliente_id", $request->storagecliente_id )
    //         ->where("tipo", "deseos")
    //         ->get()
    //         ->pluck("producto_id");
    //     }
        
    //     $productosmaspedidos = Producto::where( "stock", "<", 10 )
    //     ->with([
    //         "empresa",
    //         "tags",
    //         "categoria",
    //         "fotos",
    //     ])
    //     ->limit(10)
    //     ->get();

    //     foreach ( $productosmaspedidos as $producto ) {

    //         if ( in_array( $producto->id , $productoCestaIds->toArray() ) ) {
    //             $producto->encarrito = true;
    //         }
    //         else {
    //             $producto->encarrito = false;
    //         }
            
    //         if ( in_array( $producto->id , $productoDeseoIds->toArray() ) ) {
    //             $producto->enlistadeseos = true;
    //         }
    //         else {
    //             $producto->enlistadeseos = false;
    //         }

    //     }

    //     return ProductoResource::collection( $productosmaspedidos );

    // }





    public function getdatosxid ( Request $request ) {
        $producto = Producto::where("id", $request->has("idproducto") ? $request->idproducto : 0 )
        ->with([
            "empresa",
            "categoria",
            "tags",
            "fotos",
        ])
        ->first();

        if ( $producto != null ) {
            return new ProductoResource (  $producto );
        }

        return "No se enncontro el producto";

    }


}

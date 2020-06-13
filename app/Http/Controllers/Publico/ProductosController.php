<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;

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
        


        return response()->json([
            'recomendados' => ProductoResource::collection( $productosrecomendados ),
            'ofertas' => []
        ], 200);
    }

    
    public function ofertas(Request $request)
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
        
        $productosofertados = Producto::where( "stock", ">", 20 )
        ->with([
            "empresa",
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        foreach ( $productosofertados as $producto ) {

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

        return ProductoResource::collection( $productosofertados );

    }

    
    public function nuevos(Request $request)
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
        
        $productosnuevos = Producto::whereDate( "created_at", now() )
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

        return ProductoResource::collection( $productosnuevos );

    }

    
    public function maspedidos(Request $request)
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
        
        $productosmaspedidos = Producto::where( "stock", "<", 10 )
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

        return ProductoResource::collection( $productosmaspedidos );

    }





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

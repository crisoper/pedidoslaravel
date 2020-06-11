<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
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
        if ( $request->has("storagecliente_id") and $request->has("storagecliente_id") != 'false') {
            # code...
        } else {
            # code...
        }
        
        $productosrecomendados = Producto::whereDate( "created_at", "<", now()  )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        return ProductoResource::collection( $productosrecomendados );
    }

    
    public function ofertas(Request $request)
    {

        $productosofertados = Producto::where( "stock", ">", 20 )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        return ProductoResource::collection( $productosofertados );
    }

    
    public function nuevos()
    {
        $productosnuevos = Producto::whereDate( "created_at", now() )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        return ProductoResource::collection( $productosnuevos );
    }

    
    public function maspedidos()
    {
        $productosmaspedidos = Producto::where( "stock", "<", 10 )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->limit(10)
        ->get();

        return ProductoResource::collection( $productosmaspedidos );
    }



    public function getdatosxid ( Request $request ) {
        $producto = Producto::where("id", $request->has("idproducto") ? $request->idproducto : 0 )
        ->with([
            "categoria",
            "tags",
            "fotos"
        ])
        ->first();

        if ( $producto != null ) {
            return new ProductoResource (  $producto );
        }

        return "No se enncontro el producto";

    }


}

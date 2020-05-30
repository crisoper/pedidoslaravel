<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
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
}

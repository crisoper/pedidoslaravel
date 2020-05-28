<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producto;
use App\Models\Admin\Productofoto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductosController extends Controller
{
    public function index( Request $request )
    {
        $productosofertas = Producto::whereDate("created_at", "<", now() )
        ->with([
            "tags",
            "categoria",
            "fotos" => function( $queryFotos ) {
                $queryFotos->limit(2);
            },
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
              
        return view('publico.inicio.index', compact('productosofertas', 'productosnuevos', 'productosmaspedidos'));
    }
}

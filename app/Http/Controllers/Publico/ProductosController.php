<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index( Request $request )
    {
        $productos = Producto::where("descripcion", 'like', "%".request()->buscar.'%')
                    ->orWhere('nombre','like','%'.request()->buscar.'%')
                    ->orWhere('precio','like','%'.request()->buscar.'%')
                    ->with(['fotos'])
                    ->get();
              
        return view('publico.inicio.index', compact('productos', 'fotosproducto'));
    }
}

<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Illuminate\Http\Request;

class RecomendadosController extends Controller
{
    public function index()
    {
        return view('publico.recomendados.index');
    }
}

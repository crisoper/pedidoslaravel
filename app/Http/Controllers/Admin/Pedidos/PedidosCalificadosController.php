<?php

namespace App\Http\Controllers\Admin\Pedidos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosCalificadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function usuario( ) {
        return Auth::user()->id;
    }

    
    public function index()
    {
        return view('admin.pedidos.pedidoscalificados.index');
    }


    public function calificados()
    {
        $pedidos = Pedido::orderBy("id", "desc")
        ->whereHas('pedidoestado', function (){}, '=', 4)
        ->with([
            'empresa',
            'cliente',
            'pedidodetalle',
            'pedidoestado',
        ])
        ->get();

        return PedidoResource::collection( $pedidos );
    }
}

<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use Illuminate\Http\Request;

class SeguimientopedidoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        return view("publico.seguimientopedido.index");
    }




    
    public function seguimientodepedido()
    {
        $pedidos = Pedido::orderBy("id", "desc")
        ->where('cliente_id', '=', auth()->user()->id)
        ->whereHas('pedidoestado', function (){})
        ->with([
            'empresa',
            'cliente',
            'pedidodetalle',
            'pedidoestado'=> function ($query){
                $query->orderBy("id", "desc");
            }
        ])
        ->get();

        return PedidoResource::collection( $pedidos );
    }
}

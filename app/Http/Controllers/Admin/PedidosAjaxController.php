<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidoestado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosAjaxController extends Controller
{
    
    public function index()
    {
        $pedidos = Pedido::orderBy("id", "desc")
        ->whereHas('pedidoestado', function (){}, '=', 1)
        ->with([
            'empresa',
            'cliente',
            'pedidodetalle',
            'pedidoestado',
        ])
        ->get();

        return PedidoResource::collection( $pedidos );
    }



    
    public function store(Request $request)
    {
        $pedidos = new Pedidoestado();
        $pedidos->empresa_id = $request->empresa_id;
        $pedidos->pedido_id = $request->pedido_id;
        $pedidos->estado = $request->estado;
        $pedidos->created_by = Auth::id();
        
        $pedidos->save();

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }

    
}

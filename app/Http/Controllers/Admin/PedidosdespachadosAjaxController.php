<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidoestado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosdespachadosAjaxController extends Controller
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
        $pedidos = Pedido::orderBy("id", "desc")
        ->whereHas('pedidoestado', function (){}, '=', 2)
        ->whereHas('pedidoestado', function ($query){
            $query->where('created_by', '=', auth()->user()->id)->where('estado', 'despachado');
        })
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
        
        $pedidodespachado = new Pedidoestado();
        $pedidodespachado->empresa_id = $request->empresa_id;
        $pedidodespachado->pedido_id = $request->pedido_id;
        $pedidodespachado->estado = $request->estado;
        $pedidodespachado->created_by = Auth::id();
        
        $pedidodespachado->save();
        

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }
}

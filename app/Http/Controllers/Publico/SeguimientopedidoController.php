<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidoestado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ->whereHas('pedidoestado', function (){}, '<=', 3)
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

    


    public function store(Request $request)
    {
        $pedidodespachado = new Pedidoestado();
        $pedidodespachado->empresa_id = $request->empresa_id;
        $pedidodespachado->pedido_id = $request->pedido_id;
        $pedidodespachado->estado = $request->estado;

        $pedidodespachado->calificacion = $request->calificacion;

        $pedidodespachado->created_by = Auth::id();
        
        $pedidodespachado->save();

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }

}

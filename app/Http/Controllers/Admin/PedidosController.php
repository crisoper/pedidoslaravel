<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidodetalle;
use App\Models\Admin\Pedidos\Pedidoestado;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    

    public function pedidosstore ( Request $request ) 
    {
        $pedido = new Pedido;
        $pedido->cliente_id = Auth::id();
        $pedido->created_by = Auth::id();
        $pedido->total = 0;
        $pedido->save();

        $total = 0;


        foreach ($request->cesta_id as $key => $value) {

            $cesta = Cesta::where("id", $request->cesta_id[ $key ])->first();

            $pediddetalle = new Pedidodetalle;
            $pediddetalle->empresa_id = $cesta ? ( $cesta->producto ? $cesta->producto->empresa_id : 0  ) : 0 ;
            $pediddetalle->producto_id = $cesta ? ( $cesta->producto ? $cesta->producto->id : 0  ) : 0; 
            $pediddetalle->pedido_id = $pedido->id;
            $pediddetalle->preciounitario = $request->precio[ $key ];
            $pediddetalle->cantidad = $request->cantidad[ $key ];
            $pediddetalle->subtotal = $request->subtotal[ $key ];
            $pediddetalle->created_by = Auth::id();
            $pediddetalle->save();

            // $total = $total  + $pediddetalle->subtotal;

            $pedido->empresa_id = $pediddetalle->empresa_id;

        }


        $pedido->total = $request->input_total_pedido_cesta_menu;
        $pedido->save();

        
        $pedidoestado = Pedidoestado::firstOrNew([
            'empresa_id' => $pedido->empresa_id,
            'pedido_id' => $pedido->id,
            'estado' => 'pedido',
        ],[
            'created_by' => Auth::id(),
        ]);

        $pedidoestado ->save();


        return response()->json(["success" => "Pedido creado correctamente"], 200);

    }





    public function index()
    {
        return view('admin.pedidos.index');
    }

    public function despachados()
    {
        return view('admin.pedidosdespachados.index');
    }

    public function entregados()
    {
        return view('admin.pedidosentregados.index');
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidodetalle;
use App\Models\Publico\Cesta;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    

    public function pedidosstore ( Request $request ) 
    {
        $pedido = new Pedido;
        $pedido->empresa_id = 1;
        $pedido->cliente_id = 1;
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
            $pediddetalle->save();

            $total = $total  + $pediddetalle->subtotal;

        }

        $pedido->total = $total;
        $pedido->save();

        return response()->json(["success" => "Pedido creado correctamente"], 200);

    }


    public function index()
    {
        // $categorias = Pedido::get();
       
        // if (!empty(request()->buscar)) 
        // {
        //     $productos = Pedido::where('nombre', 'like', '%'.request()->buscar.'%' )
        //             ->where('empresa_id', $this->empresaId())
        //             ->orderBy('id', 'desc')
        //             ->paginate(10);
        //     return view('admin.productos.index', compact('productos','categorias'));
        // }
        // else
        // {
        //     $productos = Pedido::orderBy('id', 'desc')
        //     ->where('empresa_id', $this->empresaId())
        //     ->paginate(10);
                      
         
        //     return view('admin.productos.index', compact('productos','categorias'));
        // }
        return view('admin.pedidos.index');
    }
}

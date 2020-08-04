<?php

namespace App\Http\Controllers\Admin\Pedidos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Admin\Pedidos\Pedidoestado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PedidosIngresadosController extends Controller
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
        return view('admin.pedidos.pedidosingresados.index');
    }

    
    
    public function ingresados()
    {
        if ( Auth()->user()->hasRole('SuperAdministrador')) {
            $pedidos = Pedido::orderBy("id", "desc")
        ->whereHas('pedidoestado', function (){}, '=', 1)
        ->with([
            'empresa',
            'cliente',
            'pedidodetalle',
            'pedidoestado',
        ])
        ->get();
        } else {
            $pedidos = Pedido::orderBy("id", "desc")
            ->where('empresa_id', Session::get('empresaactual',0))
            ->whereHas('pedidoestado', function (){}, '=', 1)
            ->with([
                'empresa',
                'cliente',
                'pedidodetalle',
                'pedidoestado',
            ])
            ->get();
        }
        
      

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

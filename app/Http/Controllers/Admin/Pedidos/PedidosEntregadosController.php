<?php

namespace App\Http\Controllers\Admin\Pedidos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PedidoResource;
use App\Models\Admin\Pedidos\Pedido;
use App\Models\Publico\Persona;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PedidosEntregadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function usuario()
    {
        return Auth::user()->id;
    }
    private $distribuidor;
    private $desde;
    private $hatas;

    public function index()
    {
        return view('admin.pedidos.pedidosentregados.index');
    }



    public function entregados()
    {
        $pedidos = Pedido::orderBy("id", "desc")
            ->whereHas('pedidoestado', function () {
            }, '>=', 3)
            ->with([
                'empresa',
                'cliente',
                'pedidodetalle',
                'pedidoestado',
            ])
            ->get();
        return PedidoResource::collection($pedidos);
    }
    public function pedidosPorRepartidor(Request $request)
    {


        $repartidores = [];
        $rol = Role::findOrFail(9);


        $pedidos = Pedido::OrderBy('id', 'desc')
            ->whereHas('pedidoestado', function ($query) {
                $query->where('estado', 'entregado');
            })
            ->with([
                'cliente',
                'empresa',
            ])
            ->paginate(10);

        return view(' admin.pedidos.pedidosentregados.pedidoporrepartidor', compact('pedidos', 'rol'));
    }

    public function ajaxpedidosPorRepartidor(Request $request)
    {

        $this->distribuidor = $request->id;
        $this->desde = $request->desde;
        $this->hasta = $request->hasta;

        if ($this->desde <= $this->hasta) {
            $pedidos = Pedido::OrderBy('id', 'desc')
                ->whereHas('pedidoestado', function ($query) {

                    $query->where('estado', 'entregado')
                        ->where('updated_by', $this->distribuidor)
                        ->whereBetween('updated_at', [$this->desde, $this->hasta]);
                })
                ->with([
                    'cliente',
                    'empresa',

                ])
                ->paginate(10);

            return response()->json($pedidos, 200);
        } else {
            return response()->json('error', 429);
        }
    }
    public function ajaxpedidosPorRepartidorTodos(Request $request)
    {
        $pedidos = Pedido::OrderBy('id', 'desc')
            ->whereHas('pedidoestado', function ($query) {
                $query->where('estado', 'entregado');
            })
            ->with([
                'cliente',
                'empresa',
            ])
            ->paginate(10);
        return response()->json($pedidos, 200);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use App\Models\Publico\Pedidodetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IncludeshomeController extends Controller
{
    private function empresaId()
    {
        return session()->get('empresaactual');
    }


    public function includeProductos()
    {
        $flag = 'productos';

        $categorias = Productocategoria::get();


        if (!empty(request()->buscar)) {
            $productos = Producto::where('nombre', 'like', '%' . request()->buscar . '%')
                ->where('empresa_id', $this->empresaId())
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('home', compact('flag', 'productos', 'categorias'));
        } else {
            $productos = Producto::orderBy('id', 'desc')->paginate(10);

            return view('home', compact('flag', 'productos', 'categorias'));
        }
    }
    public function includePrincipal()
    {
        $flag = 'home';
        return view('home', compact('flag'));
    }
    public function pedidosporEmpresa()
    {

        if (!empty(request()->buscar)) {
            $productos = Producto::where('nombre', 'like', '%' . request()->buscar . '%')
                ->where('empresa_id', $this->empresaId())
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('home', compact('flag', 'productos', 'categorias'));
        } else {


            $productos = Producto::orderBy('id', 'desc')
                ->where('empresa_id', $this->empresaId())
                ->paginate(10);

            $productospedidos = Pedidodetalle::select('producto_id', 'cantidad')
                ->where('empresa_id', $this->empresaId())
                ->paginate(10);

            return view('home', compact('flag', 'productos', 'categorias', 'productospedidos'));
        }
    }
    public function getproductosmasvendidos()
    {
        $flag = 'principal';
        $productoArray = [];
        $productos = Producto::where('empresa_id', $this->empresaId())->get();




        

        $productosmaspedidos = Pedidodetalle::get();
        $productopedidos = $productosmaspedidos->groupBy('producto_id');
        $arrayproducto = [];



        for ($i = 1; $i <= count($productopedidos); $i++) {
            $totalproducto = count($productopedidos[$i]);
            $arraytotalproductos = $productopedidos[$i];

            for ($itemproducto = 0; $itemproducto < count($arraytotalproductos); $itemproducto++) {

                for ($j = 0; $j < count($productos); $j++) {

                    if ($arraytotalproductos[$itemproducto]->producto_id ==  $productos[$j]->id) {

                        $arrayproducto[] = [
                            'id' =>  $productos[$j]->id,
                            'producto' =>  $productos[$j]->nombre,
                            'cantidad' =>  $totalproducto,
                            'fecha' => $arraytotalproductos[$itemproducto]->created_at,
                        ];
                    }
                }
            }
        }

       
        // return $arrayproducto;
        return response()->json($arrayproducto, 200);
    }
}

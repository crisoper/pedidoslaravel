<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use App\Models\Publico\Pedidodetalle;
use App\Models\Admin\Productocategoria;
use App\Models\Publico\Cesta;
use App\Models\Publico\Persona;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Contracts\DataTable;


use Carbon\Carbon;

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



    public function getproductosmaspedidos()
    {        
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 7 );

        // $productomaspedidos = Cesta::join("productos", 'cestas.producto_id', '=', 'productos.id')
        // ->select("productos.nombre", "cestas.created_at", DB::raw('COUNT( cestas.id ) AS cantidad') )
        // ->groupBy("productos.nombre", "cestas.created_at")
        // ->orderBy("cantidad", "desc")
        // ->whereDate("cestas.created_at", ">=", $fechainicio )
        // ->whereDate("cestas.created_at", "<=", $hoy )
        // ->limit(5)
        // ->get();
       

         $productomaspedidos = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("pedidodetalles.empresa_id","productos.nombre",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->where('pedidodetalles.empresa_id', $this->empresaId())
        ->groupBy("productos.nombre" ,"pedidodetalles.empresa_id" )
        ->orderBy("cantidad", "desc")
        ->whereDate("pedidodetalles.created_at", ">=", $fechainicio )
        ->whereDate("pedidodetalles.created_at", "<=", $hoy )
        ->limit(5)
        ->get();
        // return response()->json([$productomaspedidos, $hoy, $fechainicio], 200);
        return response()->json($productomaspedidos, 200);
    }

    public function getHistoricoVentas(){
        $hoy =  Carbon::now();
        $fechainicio = Carbon::now()->subDays( 7 );

        $productomaspedidos = Pedidodetalle::join("productos", 'pedidodetalles.producto_id', '=', 'productos.id')
        ->select("pedidodetalles.empresa_id", "productos.nombre",  DB::raw('COUNT( pedidodetalles.id ) AS cantidad') )
        ->where('pedidodetalles.empresa_id', $this->empresaId())
        ->groupBy("productos.nombre", "pedidodetalles.empresa_id"   )
        ->orderBy("cantidad", "desc")
        ->limit(5)
        ->get();
 
        return response()->json($productomaspedidos, 200);
    }
    public function totalderegistros(){
        $totalempresas = Empresa::all()->count();
        $totalusuarios = Persona::all()->count();
        $totalpedidos = Pedidodetalle::all()->count();
        return  response()->json([$totalempresas, $totalusuarios, $totalpedidos], 200);
    }

    public function empresasRegitradas(){
        
        $empresa = Empresa::select('ruc', 'nombre', 'direccion')->get();
        return response()->json($empresa, 200);

        
   
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductoofertaResource;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use App\Models\Admin\Productooferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductosofertarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function periodoId(Request $request)
    {
        return $request->session()->get('periodoactual', 0);
    }


    private function empresaId()
    {
        return Session::get('empresaactual', 0);
    }


    
    public function index()
    {
        
        $categorias = Productocategoria::get();

        $productosofertados = Productooferta::get();
        $arrayrecomendar = [];
        foreach ($productosofertados as $producto) {
            array_push($arrayrecomendar, $producto->producto_id);
        }


        if (!empty(request()->buscar)) {
            $productos = Producto::where('nombre', 'like', '%' . request()->buscar . '%')
                ->where('empresa_id', $this->empresaId())
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.productos.ofertar', compact('productos', 'categorias', 'productosofertados', 'arrayrecomendar'));
        } else {
            $productos = Producto::orderBy('id', 'desc')
                ->where('empresa_id', $this->empresaId())
                ->paginate(10);


            return view('admin.productos.ofertar', compact('productos', 'categorias', 'productosofertados', 'arrayrecomendar'));
        }
    }

    public function getdatosxidofertar ( Request $request ) {
        $productoEnModal = Producto::where("id", $request->has("idproducto") ? $request->idproducto : 0 )
        ->with([
            "empresa",
            "categoria",
            "tags",
            "fotos",
            "recomendar"
        ])
        ->first();

        if ( $productoEnModal != null ) {
            return new ProductoofertaResource (  $productoEnModal );
        }

        return "No se enncontro el producto";

    }

    


    public function update(Request $request)
    {
        $recomendarproducto = Productooferta::where( "empresa_id", $request->empresa_id )
        ->where( "producto_id", $request->producto_id )
        ->first();

        if ( !$recomendarproducto ) {
            $recomendarproducto = new Productooferta();
        }
        $recomendarproducto->empresa_id = $request->empresa_id;
        $recomendarproducto->producto_id = $request->producto_id;
        $recomendarproducto->preciooferta = $request->preciooferta;
        $recomendarproducto->diainicio = $request->diainicio;
        $recomendarproducto->diafin = $request->diafin;
        $recomendarproducto->created_by = Auth()->user()->id;
        
        $recomendarproducto->save();

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }

    
    public function destroy(Request $request)
    {
        $recomendarproducto = Productooferta::where( "empresa_id", $request->empresa_id )
        ->where( "producto_id", $request->producto_id )
        ->first();

        if ( $recomendarproducto ) {
            $recomendarproducto->delete();
            return response()->json(['success' => "Operacion realizada con exito"], 200);
        }
        
        return response()->json(['error' => "No se ha encontrado el recurso"], 404);
    }
}

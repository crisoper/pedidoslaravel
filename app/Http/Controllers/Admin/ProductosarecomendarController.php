<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductorecomendarResource;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use App\Models\Admin\Productorecomendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductosarecomendarController extends Controller
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

        $productosrecomendados = Productorecomendar::get();
        $arrayrecomendar = [];
        foreach ($productosrecomendados as $producto) {
            array_push($arrayrecomendar, $producto->producto_id);
        }


        if (!empty(request()->buscar)) {
            $productos = Producto::where('nombre', 'like', '%' . request()->buscar . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.productos.recomendar', compact('productos', 'categorias', 'productosrecomendados', 'arrayrecomendar'));
        } else {
            $productos = Producto::orderBy('id', 'desc')
                ->paginate(10);


            return view('admin.productos.recomendar', compact('productos', 'categorias', 'productosrecomendados', 'arrayrecomendar'));
        }
    }

    public function getdatosxidrecomendar ( Request $request ) {
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
            return new ProductorecomendarResource (  $productoEnModal );
        }

        return "No se enncontro el producto";

    }

    


    public function update(Request $request)
    {
        $recomendarproducto = Productorecomendar::where("producto_id", $request->producto_id )
        ->where("recomendar", $request->recomendar )
        ->first();

        if ( !$recomendarproducto ) {
            $recomendarproducto = new Productorecomendar();
        }
        $recomendarproducto->empresa_id = $request->empresa_id;
        $recomendarproducto->producto_id = $request->producto_id;
        $recomendarproducto->recomendar = $request->recomendar;
        $recomendarproducto->diainicio = $request->diainicio;
        $recomendarproducto->diafin = $request->diafin;
        $recomendarproducto->created_by = Auth()->user()->id;
        
        $recomendarproducto->save();

        return response()->json(['success' => "Operacion realizada con exito"], 200);
    }

    
    public function destroy(Request $request)
    {
        $recomendarproducto = Productorecomendar::where( "empresa_id", $request->empresa_id )
        ->where( "producto_id", $request->producto_id )
        ->where("recomendar", $request->recomendar )
        ->first();

        if ( $recomendarproducto ) {
            $recomendarproducto->delete();
            return response()->json(['success' => "Operacion realizada con exito"], 200);
        }
        
        return response()->json(['error' => "No se ha encontrado el recurso"], 404);
    }
}

<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $productos = Producto::where("nombre", 'like', "%");

        if ( $request->has("buscar") and $request->buscar != "" ) {
            $productos = $productos->where("nombre", "like", "%".$request->buscar."%");
        }

        $productos = $productos->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->paginate(10);

        return ProductoResource::collection( $productos );
        // return response()->json(["data" => $productos ], 200);
    }

    
    /**
     * Mostrar los ultimos 9 productos registrados
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevos()
    {
        $categorias = Producto::orderBy("created_at", "desc")->take(9)->get();
        return ProductoResource::collection( $categorias );
    }

}

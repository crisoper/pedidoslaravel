<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Illuminate\Http\Request;

class OfertasAjaxController extends Controller
{
    public function index(Request $request)
    {
        if ( $request->has("storagecliente_id") and $request->has("storagecliente_id") != 'false') {
            # code...
        } else {
            # code...
        }
        
        $productosofertados = Producto::where( "stock", ">", 20 )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        return ProductoResource::collection( $productosofertados );
    }
}

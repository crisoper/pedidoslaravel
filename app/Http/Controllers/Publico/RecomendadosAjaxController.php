<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\ProductoResource;
use App\Models\Admin\Producto;
use Illuminate\Http\Request;

class RecomendadosAjaxController extends Controller
{
    public function index(Request $request)
    {
        if ( $request->has("storagecliente_id") and $request->has("storagecliente_id") != 'false') {
            # code...
        } else {
            # code...
        }
        
        $productosrecomendados = Producto::whereDate( "created_at", "<", now()  )
        ->with([
            "tags",
            "categoria",
            "fotos",
        ])
        ->get();

        return ProductoResource::collection( $productosrecomendados );
    }
}

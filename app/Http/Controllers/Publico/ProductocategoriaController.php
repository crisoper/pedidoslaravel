<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Resources\Publico\CategoriaResource;
use App\Models\Admin\Productocategoria;
use Illuminate\Http\Request;

class ProductocategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Productocategoria::get();
        return CategoriaResource::collection( $categorias );
    }


}

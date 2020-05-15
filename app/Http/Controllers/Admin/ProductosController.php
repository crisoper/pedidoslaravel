<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductosCreateRequest;
use App\Http\Requests\Admin\ProductosUpdateRequest;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Productocategoria::get();
        $productos = Producto::where('empresa_id', 1)->orWhere('stock' ,'>',0)->get();
        return view('admin.productos.index', compact('categorias', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Productocategoria::get();
       
        return view('admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosCreateRequest $request)
    {
        $productos = Producto::firstOrNew(
            [
                'empresa_id' => 1,
                'categoria_id' => $request->categoriaid,
                'nombre' => $request->nombre,
                ],
                [
                    
                    'descripcion' => $request->descripcion,
                    'precio' => $request->precio,
                    'codigo' => $request->codigo,
                    'stock' => $request->stock,
                    'created_by' => Auth()->user()->id,
            ]
         );
     
         $productos->save();
        return redirect()->route('productos.index');
        //  return response()->json(['success' => "Datos guardados correctamente"], 200);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Productocategoria::get();
        $producto = Producto::findOrFail($id);
        return view('admin.productos.editar', compact('categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductosUpdateRequest $request, $id)
    {
        $productos = Producto::findOrFail($id);
        $productos->empresa_id = 1;
        $productos->categoria_id = $request->categoriaid;
        $productos->nombre = $request->nombre;
        $productos->descripcion =  $request->descripcion;
        $productos->precio =  $request->precio;
        $productos->codigo = $request->codigo;
        $productos->stock = $request->stock;
        $productos->updated_by =  Auth()->user()->id;
        $productos->save();
        return    redirect()->route('productos.index');  
        //  return response()->json(['success' => "Datos guardados correctamente"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->deleted_at = Auth()->user()->id;
        $productos->delete();
        
        return redirect()->route('productos.index');
    }
}

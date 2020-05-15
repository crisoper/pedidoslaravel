<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriasCreateRequest;
use App\Http\Requests\Admin\CategoriasUpdateRequest;
use App\Models\Admin\Productocategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductocategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $categorias = Productocategoria::get();
        if (!empty(request()->buscar)) 
        {
            $categorias = Productocategoria::where('nombre', 'like', '%'.request()->buscar.'%' )
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            return view('admin.productocategorias.index', compact('categorias'));
        }
        else
        {
            $categorias = Productocategoria::orderBy('id', 'desc')->paginate(10);
            return view('admin.productocategorias.index', compact('categorias'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Productocategoria::get();
        return view('admin\productocategorias\create', compact('categorias'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriasCreateRequest $request)
    {
      
        $categorias = Productocategoria::firstOrNew(
            [
            'empresa_id' => 1,
            'nombre' => $request->nombre,
            'parent_id'=> $request->parent_id,
        ],
        [
            
            'created_by' => Auth()->user()->id,
        ]);
        $categorias->save();
        // return response()->json(['success' => "Datos guardados correctamente"], 200);
      
        return redirect()->route('categorias.index');
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
        $categoria = Productocategoria::findOrFail($id);
        $categorias = Productocategoria::get();
        return view('admin\productocategorias\editar', compact('categorias','categoria'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriasUpdateRequest $request, $id)
    {
        $categoria= Productocategoria::findOrFail($id);
        $categoria->parent_id = $request->categoriaid;
        $categoria->nombre = $request->nombre;
        $categoria->updated_by = Auth()->user()->id;
        $categoria->save();
        return redirect()->route('categorias.index');
        // return response()->json(['success' => "Datos guardados correctamente"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = Productocategoria::findOrFail($id);
        $categorias->delete_at = Auth()->user()->id;
        $categorias->delete();

        return redirect()->route('categorias.index');

        

    }
}

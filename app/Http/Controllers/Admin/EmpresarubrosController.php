<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresas\EmpresarubrosCreateRequest;
use App\Models\Admin\Empresarubro;
use Illuminate\Http\Request;

class EmpresarubrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresarubros = Empresarubro::query();

        if ($request->has("buscar") and $request->buscar != "") {
            $empresarubros = $empresarubros->where("nombre", "like", "%" . $request->buscar . "%")
            ->orWhere("descripcion", "like", "%" . $request->buscar . "%");
        }

        $empresarubros = $empresarubros = $empresarubros->paginate(7);

        return view("admin.empresarubros.index", compact("empresarubros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.empresarubros.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresarubrosCreateRequest $request)
    {
        $empresarubro = new Empresarubro;
        $empresarubro->nombre = $request->nombre;
        $empresarubro->descripcion = $request->descripcion;
        $empresarubro->created_by = auth()->user()->id;
        $empresarubro->save();

        return redirect()->route("empresarubros.index")->with("info", "Registro creado");
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
        $empresarubro = Empresarubro::findOrFail($id);
        return view("admin.empresarubros.edit", compact("empresarubro"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

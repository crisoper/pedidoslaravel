<?php

namespace App\Http\Controllers\Admin\Permisos;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permisos\Accionpermiso;
use Illuminate\Http\Request;

class AccionpermisosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accionpermisos = Accionpermiso::paginate(10);
        return view('admin.permisos.accionpermiso.index', compact('accionpermisos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permisos.accionpermiso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accionpermiso = new AccionPermiso();
        $accionpermiso->nombre = $request->input('nombre');
        $accionpermiso->save();

        return redirect()->route('accionpermisos.index')->with('info', 'Registro creado');


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
        $accionpermiso = Accionpermiso::findOrFail($id);
        return view('usuarios.accionpermiso.edit', compact('accionpermiso') );
    }


}

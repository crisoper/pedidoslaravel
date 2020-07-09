<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ComprobantetipoCreateRequest;
use App\Http\Requests\Admin\ComprobantetipoUpdateRequest;
use App\Models\Admin\Comprobantetipo;
use Illuminate\Http\Request;

class ComprobantestiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantesTipos = Comprobantetipo::get();
        if (!empty(request()->buscar)) {
            $comprobantesTipos = Comprobantetipo::where('nombre', 'like', '%' . request()->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . request()->buscar . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.comprobantestipos.index', compact('comprobantesTipos'));
        } else {
            $comprobantesTipos = Comprobantetipo::orderBy('id', 'desc')->paginate(10);
            return view('admin.comprobantestipos.index', compact('comprobantesTipos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comprobantesTipos = Comprobantetipo::get();
        return view('admin.comprobantestipos.create', compact('comprobantesTipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComprobantetipoCreateRequest $request)
    {
        $comprobanteTipo = Comprobantetipo::firstOrNew(
            [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
            ]
        );
        $comprobanteTipo->created_by = Auth()->user()->id;
        $comprobanteTipo->save();

        if (auth()->user()->hasRole('SuperAdministrador')) {
            return redirect()->route('comprobantetipos.index');
        } else {
            return redirect()->route('config.comprobantes.index');
        }
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
        $comprobanteTipo = Comprobantetipo::findOrFail($id);

        return view('admin.comprobantestipos.edit', compact('comprobanteTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComprobantetipoUpdateRequest $request, $id)
    {
        $comprobanteTipo = Comprobantetipo::findOrFail($id);

        $comprobanteTipo->nombre = $request->nombre;
        $comprobanteTipo->descripcion = $request->descripcion;
        $comprobanteTipo->updated_by = Auth()->user()->id;
        $comprobanteTipo->save();

        if (auth()->user()->hasRole('SuperAdministrador')) {

            return redirect()->route('comprobantetipos.index');
        } else {
            return redirect()->route('config.comprobantes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comprobanteTipo = Comprobantetipo::findOrFail($id);
        $comprobanteTipo->delete();

        return redirect()->route('comprobantestipos.index');
    }
}

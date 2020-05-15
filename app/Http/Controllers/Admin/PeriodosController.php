<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeriodosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idempresa = session()->get('empresaactual');
        $periodos = Periodo::where('empresa_id', $idempresa )->get();
               

        if(!empty(request()->buscar)){
            $periodos = Periodo::where('nombre','like','%'.request()->buscar.'%')
            ->where('empresa_id', $idempresa)
            ->orWhere('inicio','like','%'.request()->buscar.'%')
            ->orWhere('fin','like','%'.request()->buscar.'%')
            ->orderBy(request('sort','id'),'ASC')
            ->paginate(10);
            return view('admin.periodos.index', compact('periodos'));
        }else{
            $periodos = Periodo::where('empresa_id', $idempresa)->orderBy(request('sort','id'),'ASC')
            ->paginate(10);
            return view('admin.periodos.index', compact('periodos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::get();
        return view('admin.periodos.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo = new Periodo();
        $periodo->empresa_id = $this->empresaId();
        $periodo->nombre = $request->nombre;
        $periodo->inicio = $request->inicio;
        $periodo->fin = $request->fin;
        $periodo->estado = $request->estado;
        $periodo->created_by = Auth()->user()->id;
        $periodo->save();
        return redirect()->route('periodos.index');
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
        $periodo = Periodo::findOrFail($id);
        $empresas = Empresa::get();

        return view('admin.periodos.edit', compact('periodo', 'empresas'));
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
        $periodo = Periodo::findOrFail($id);
        $periodo->empresa_id = $request->empresa_id;
        $periodo->nombre = $request->nombre;
        $periodo->inicio = $request->inicio;
        $periodo->fin = $request->fin;
        $periodo->estado = $request->estado;
        $periodo->updated_by = Auth()->user()->id;
        $periodo->save();
        
        return redirect()->route('periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $periodo = Periodo::findOrFail($id);
        $periodo->deleted_at = Auth()->user()->id;
        $periodo->save();
        
       return redirect()->route('periodos.index');

    }
}

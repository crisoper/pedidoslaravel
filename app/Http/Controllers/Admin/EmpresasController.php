<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresas\EmpresaCreateRequest;
use App\Http\Requests\Admin\Empresas\EmpresaUpdateRequest;
use App\Models\Admin\Comprobantetipo;
use App\Models\Admin\Empresa;
use App\Models\Admin\Empresacomprobantetipos;
use App\Models\Admin\Empresarubro;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Image;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::get();

        if(!empty(request()->buscar)){
            $empresas = Empresa::where('ruc','like','%'.request()->buscar.'%')
            ->orWhere('nombre','like','%'.request()->buscar.'%')
            ->orderBy(request('sort','id'),'ASC')
            ->paginate(10);
            return view('admin.empresas.index', compact('empresas'));
        }else{
            $empresas = Empresa::orderBy(request('sort','id'),'ASC')
            ->paginate(10);
            return view('admin.empresas.index', compact('empresas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresarubros = Empresarubro::get();
        return view('admin.empresas.create', compact('empresarubros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaCreateRequest $request)
    {
        $empresa = new Empresa();
        $empresa->rubro_id = $request->rubro_id;
        $empresa->ruc = $request->ruc;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->paginaweb = $request->paginaweb;
        
        if ($request->hasFile('logo')) {
            $nombreOriginalLogo = $request->file('logo');
            $extension = strtolower( $nombreOriginalLogo->getClientOriginalExtension() ) ;
            $nuevoNombreLogo = $nombreOriginalLogo->getClientOriginalName();
            \Storage::disk('usuarios')->put($nuevoNombreLogo,  \File::get($nombreOriginalLogo));
            
            $dimensionLogo = Image::make($nombreOriginalLogo->path());
            $dimensionLogo->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });
            $dimensionLogo->save(storage_path('app/public/empresaslogos').'/'.$nuevoNombreLogo);
            $empresa->logo = $nuevoNombreLogo;
        }
        $empresa->created_by = Auth()->user()->id;

        $empresa->save();

        return redirect()->route('empresas.index')->with("info", "Registro creado");
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
        $empresarubros = Empresarubro::get();
        $empresa = Empresa::findOrFail($id);

        return view('admin.empresas.edit', compact('empresa', 'empresarubros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaUpdateRequest $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->rubro_id = $request->rubro_id;
        $empresa->ruc = $request->ruc;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->paginaweb = $request->paginaweb;
        
        
        if ($request->hasFile('logo')) {
            if (Storage::exists("/public/empresaslogos/$empresa->logo"))
            {
                Storage::delete("/public/empresaslogos/$empresa->logo");
            }
            $nombreOriginalLogo = $request->file('logo');
            $extension = strtolower( $nombreOriginalLogo->getClientOriginalExtension() ) ;
            $nuevoNombreLogo = $nombreOriginalLogo->getClientOriginalName();
            \Storage::disk('usuarios')->put($nuevoNombreLogo,  \File::get($nombreOriginalLogo));
            
            $dimensionLogo = Image::make($nombreOriginalLogo->path());
            $dimensionLogo->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });
            $dimensionLogo->save(storage_path('app/public/empresaslogos').'/'.$nuevoNombreLogo);
            $empresa->logo = $nuevoNombreLogo;
        }
        $empresa->updated_by = Auth()->user()->id;
        
        $empresa->save();

        return redirect()->route('empresas.index')->with("info", "Registro editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        if (Storage::exists("/public/empresaslogos/$empresa->logo"))
        {
            Storage::delete("/public/empresaslogos/$empresa->logo");
        }
        $empresa->deleted_at = Auth()->user()->id;
        $empresa->delete();
        
       return redirect()->route('empresas.index')->with("info", "Registro eliminado");
    }


    
    //AGREGAR PERMISOS
    public function agregarcomprobantetipos($id)
    {
        $empresa = Empresa::findOrFail($id);

        $comprobantetipos = Comprobantetipo::get();
        
        $empresacomprobantetipos = Empresacomprobantetipos::get();

        return view('admin.empresas.agregarcomprobantetipos', compact('empresa', 'comprobantetipos', 'empresacomprobantetipos'));
    }

    //GUARDAR PERMISOS
    public function guardarcomprobantetipos(Request $request, $id)
    {
        $empresa = Empresa::findOrFail( $id );
        $empresa->comprobantetipos()->sync( $request->empresacomprobantetipos ); 

        return redirect()->route('empresas.index')->with("Datos guardados correctamente", "info");
    }
}

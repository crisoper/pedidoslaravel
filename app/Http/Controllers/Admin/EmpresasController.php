<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;
use App\Models\Publico\Horario;
use App\Models\Publico\Persona;
use App\Models\Publico\Distrito;
use App\Models\Admin\Userempresa;
use App\Models\Publico\Provincia;
use App\Models\Admin\Empresarubro;
use App\Models\Admin\Modelhasrole;
use App\Http\Controllers\Controller;
use App\Models\Publico\Departamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Comprobantetipo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as rol;
// use Image;
use App\Models\Admin\Empresacomprobantetipos;
use App\Mail\Publico\ActivarcuentaempresaMail;
use App\Http\Requests\Publico\CreatuempresaCreateRequest;
use App\Http\Requests\Admin\Empresas\EmpresaCreateRequest;
use App\Http\Requests\Admin\Empresas\EmpresaUpdateRequest;
use App\Http\Requests\Publico\CambiaremailCreateRequest;
use App\Jobs\ProcesssendmailJob;
use App\Models\Admin\Userperiodo;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rules\Exists;

class EmpresasController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function guard()
    {
        return Auth::guard();
    }
    

    private function empresaId()
    {
        return Session::get('empresaactual', 0);
    }


    public function index()
    {

        if (!empty(request()->buscar)) {
            $empresas = Empresa::whereHas('usuarios', function ($query) {
                $query->where('user_id', '=', auth()->user()->id);
            })
                ->where('ruc', 'like', '%' . request()->buscar . '%')
                ->orWhere('nombre', 'like', '%' . request()->buscar . '%')
                ->orderBy(request('sort', 'id'), 'ASC')
                ->paginate(10);
            return view('admin.empresas.index', compact('empresas'));
        } else {

            $empresas = Empresa::whereHas('usuarios', function ($query) {
                $query->where('user_id', '=', auth()->user()->id);
            })
                ->orderBy(request('sort', 'id'), 'ASC')
                ->paginate(10);

            return view('admin.empresas.index', compact('empresas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



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
        $empresa = Empresa::findOrFail($this->empresaId());
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $distritos = Distrito::get();
        $empresarubros = Empresarubro::get();
        $diahorario = Horario::where('empresa_id', $empresa->id)->get();
        $diasenhorario = [];
        foreach ($diahorario as $dia) {
            array_push($diasenhorario, $dia->dia);
        }

        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

        return view('admin.empresas.edit', compact('empresa', 'empresarubros', 'departamentos', 'provincias', 'distritos', 'dias', 'diasenhorario', 'empresarubros', 'diahorario'));
        // return view('publico.empresa.editar', compact('empresa', 'empresarubros', 'departamentos', 'provincias', 'distritos', 'dias', 'diasenhorario', 'empresarubros', 'diahorario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // EmpresaUpdateRequest
    public function update(EmpresaUpdateRequest $request)
    {


        $empresa = Empresa::findOrFail($request->empresaid);
        $empresa->rubro_id = $request->rubro_id;
        $empresa->ruc = $request->ruc;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->nombrecomercial = $request->nombrecomercial;
        $empresa->departamento_id = $request->departamentoid;
        $empresa->provincia_id = $request->provinciaid;
        $empresa->distrito_id = $request->distritoid;
        $empresa->updated_by = Auth()->user()->id;
        $empresa->save();

        // if ($request->hasFile('logo')) {
        //     $nombreOriginalLogo = $request->file('logo');
        //     $extension = strtolower($nombreOriginalLogo->getClientOriginalExtension() );
        //     $nuevoNombreLogo = strtolower($nombreOriginalLogo->getClientOriginalName() );
        //     \Storage::disk('usuarios')->put($nuevoNombreLogo,  \File::get($nombreOriginalLogo));

        //     $dimensionLogo = Image::make($nombreOriginalLogo->path());
        //     $dimensionLogo->fit(300, 200, function ($constraint) {
        //         $constraint->upsize();
        //     });
        //     $dimensionLogo->save(storage_path('app/public/empresaslogos') . '/' . $nuevoNombreLogo);
        //     $empresa->logo = $nuevoNombreLogo;
        // }


        return response()->json('success', 200);
    }

    public function tuempresaUpdate(Request $request)
    {
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
        if (Storage::exists("/public/empresaslogos/$empresa->logo")) {
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
        $empresa = Empresa::findOrFail($id);
        $empresa->comprobantetipos()->sync($request->empresacomprobantetipos);

        if (auth()->user()->hasRole('SuperAdministrador')) {

            return redirect()->route('empresas.index')->with("Datos guardados correctamente", "info");
        } else {
            return redirect()->route('config.comprobantes.index');
        }
    }


    

    private function enviarCorreoActivarCuentaEmpresa($user)
    {

        try {
            Mail::to($user->email)
                ->cc("gilbertofores@gmail.com")
                ->send(new  ActivarcuentaempresaMail($user));
        } catch (\Exception $e) {
            return null;
        }
    }

    public function confirmarcuenta()
    {
        return view('publico.empresa.confirmarcuenta');
    }




    public function vistaprevia()
    {


        return view('publico.empresa.preview');
    }
}

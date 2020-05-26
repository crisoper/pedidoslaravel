<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresas\EmpresaCreateRequest;
use App\Http\Requests\Admin\Empresas\EmpresaUpdateRequest;
use App\Http\Requests\Publico\CreatuempresaCreateRequest;
use App\Models\Admin\Comprobantetipo;
use App\Models\Admin\Empresa;
use App\Models\Admin\Empresacomprobantetipos;
use App\Models\Admin\Empresarubro;
use App\Models\Admin\Modelhasrole;
use App\Models\Admin\Periodo;
use App\Models\Admin\Userempresa;
use App\Models\Publico\Departamento;
use App\Models\Publico\Distrito;
use App\Models\Publico\Horario;
use App\Models\Publico\Persona;
use App\Models\Publico\Provincia;
use Spatie\Permission\Models\Role as rol;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        // if( $tempresas == 0 ){
        //    return view('layouts.paginas.mensajes.sinempresas');
        // }else{
         
           
        //    return redirect()->route('config.seleccionar.periodo');
        // }
  

        if(!empty(request()->buscar)){
            $empresas = Empresa::whereHas('usuarios', function ($query) {
                $query->where( 'user_id', '=', auth()->user()->id );
            })
            ->where('ruc','like','%'.request()->buscar.'%')
            ->orWhere('nombre','like','%'.request()->buscar.'%')
            ->orderBy(request('sort','id'),'ASC')
            ->paginate(10);
            return view('admin.empresas.index', compact('empresas'));
        }else{
    
            $empresas = Empresa::whereHas('usuarios', function ($query) {
                $query->where( 'user_id', '=', auth()->user()->id );
            })
            ->orderBy(request('sort','id'),'ASC')
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


 
    //REGISTRA TU EMPRESA
    public function registrarTuEmpresa(){
        $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado', 'Domingo'];
        $empresarubros  = Empresarubro::get();
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $distritos = Distrito::get();
        $usuario = Auth()->user()->email;
        return view('publico.empresa.create', compact('empresarubros','departamentos','provincias','distritos','usuario','dias'));

        
    }
    public function tuempresastore(Request $request){
        // CreatuempresaCreateRequest
        // <a class="text-warning" href="{{route('registrarTuEmpresa')}}">Afilia tu restaurante</a>
    //     $user= User::all();     
    //     $userid = $user->last();  
    

        $persona = Persona::firstOrNew([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            
        ],
        [
            'created_by' => Auth()->user()->id,
        ]);
        $persona->save();

        $empresa = new Empresa();
        $empresa->rubro_id = $request->rubro_id;
        $empresa->ruc = $request->ruc;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->paginaweb = $request->facebook;
        $empresa->nombrecomercial = $request->nombrecomercial;
        $empresa->departamento_id = $request->departamentoid;
        $empresa->provincia_id = $request->procinciaid;
        $empresa->distrito_id = $request->distritoid;
        $empresa->persona_id = $persona->id;
                
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

        Userempresa::create([
            'user_id' => Auth()->user()->id,
            'empresa_id' => $empresa->id,
            'estado' => 1,            
        ]);
        
        $periodo = new Periodo();
        $periodo->empresa_id = $empresa->id;
        $periodo->nombre = 'demo'.  $empresa->ruc;
        $fechaActual = date('Y-m-d');
        $fechaFin = strtotime ( '+6 month' , strtotime ( $fechaActual ) ) ;
        $fechaFin = date ( 'Y-m-d' , $fechaFin );
        $periodo->inicio = date('Y-m-d');
        $periodo->fin = $fechaFin;
        $periodo->estado= 1;
        $periodo->created_by = Auth()->user()->id;
        $periodo->save();
        
        $rol = rol::where('name', 'web_Administrador empresa')->first();
        
         Modelhasrole::create([
            'role_id' => $rol->id,
            'model_type' => 'App\User' ,
            'model_id'=> Auth()->user()->id,
        ]); 
     
  
       
      
        $dias = [];
        foreach ($request->dia as $dia) {
            if( $dia != null ){
                array_push($dias, $dia);    
            }
        }
        $horainicio = [];
        foreach ($request->horainicio as $inicio) {
            if( $inicio != null ){
                array_push($horainicio, $inicio);    
            }
        }
        $horafin = [];
        foreach ($request->horafin as $fin) {
            if( $fin != null ){
                array_push($horafin, $fin);    
            }
        }

        for ($i = 0; $i < count($dias) ; $i++) { 
            $horario = new Horario();
            $horario->empresa_id =  $empresa->id;
            $horario->dia =  $dias[$i];
            $horario->horainicio = $horainicio[$i];
            $horario->horafin =  $horafin[$i];
            $horario->created_by = Auth()->user()->id;        
            $horario->save();

        }

        return redirect()->route('home')->with("info", "Registro creado");
    
    }
}

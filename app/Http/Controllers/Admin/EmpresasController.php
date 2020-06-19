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
    public function registrartuempresa(){
        $dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
        $empresarubros  = Empresarubro::get();
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $distritos = Distrito::get();

        return view('publico.empresa.create', compact('empresarubros','departamentos','provincias','distritos','dias'));

        
    }
    
    protected function guard()
    {
        return Auth::guard();
    }

    public function tuempresastore( CreatuempresaCreateRequest $request){
      
        $dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo'];
        $diasNoValidosInicio = array();
        $diasNoValidosFin = array();
    
        
        foreach ($request->dias as $key => $value) {
            if ( $request->horainicio[$key] == null) {
                $diasNoValidosInicio[] = $dias[$key - 1];
            }
            if ( $request->horafin[$key] == null) {
                $diasNoValidosFin[] = $dias[$key - 1];
            }
        } 
    
    
        if ( count( $diasNoValidosInicio ) > 0 || count( $diasNoValidosFin ) > 0 ) {
            return response()->json([
                'error' =>  [
                    'message' => 'Por favor complete hora unicio y hora fin de manera correcta',
                    'data' => [
                        "inicio" => $diasNoValidosInicio,
                        "fin" => $diasNoValidosFin,
                    ]
                ] 
            ], 429);
        }    

        $user = User::firstOrNew([
            'name' => $request->name ." ". $request->paterno ." ". $request->materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->remember_token = Hash::make( time() );
        $user->save();
      

        $persona = Persona::firstOrNew([
            'nombre' => $request->name,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->email,
            
        ],
        [
            'created_by' => $user->id,
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
        $empresa->provincia_id = $request->provinciaid;
        $empresa->distrito_id = $request->distritoid;
        $empresa->persona_id = $persona->id;
                
        if ($request->hasFile('logo')) {
            $nombreOriginalLogo = $request->file('logo');
            $extension = strtolower( $nombreOriginalLogo->getClientOriginalExtension() ) ;
            $nuevoNombreLogo = strtolower($nombreOriginalLogo->getClientOriginalName());
            \Storage::disk('usuarios')->put($nuevoNombreLogo,  \File::get($nombreOriginalLogo));
            
            $dimensionLogo = Image::make($nombreOriginalLogo->path());
            $dimensionLogo->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });
            $dimensionLogo->save(storage_path('app/public/empresaslogos').'/'.$nuevoNombreLogo);
            $empresa->logo = $nuevoNombreLogo;
        }
        $empresa->created_by = $user->id;

        $empresa->save();

        Userempresa::create([
            'user_id' => $user->id,
            'empresa_id' => $empresa->id,
            'estado' => 1,            
        ]);
        
        $periodo = new Periodo();
        $periodo->empresa_id = $empresa->id;
        $periodo->nombre = 'demo';
        $fechaActual = date('Y-m-d');
        $fechaFin = strtotime ( '+12 month' , strtotime ( $fechaActual ) ) ;
        $fechaFin = date ( 'Y-m-d' , $fechaFin );
        $periodo->inicio = date('Y-m-d');
        $periodo->fin = $fechaFin;
        $periodo->estado= 1;
        $periodo->created_by = $user->id;
        $periodo->save();

        $userperiodo = new Userperiodo();
        $userperiodo->user_id =  $user->id;
        $userperiodo->periodo_id = $periodo->id;
        $userperiodo->created_at = $user->id;
        $userperiodo->save();

        
        $rol = rol::where('name', 'web_Administrador empresa')->first();
        
         Modelhasrole::create([
            'role_id' => $rol->id,
            'model_type' => 'App\User' ,
            'model_id'=> $user->id,
        ]); 
     
        for ($i = 1; $i <= count($request->dias) ; $i++) { 
            $horario = new Horario();
            $horario->empresa_id = $empresa->id;
            $horario->dia =  $dias[$i];
            $horario->horainicio = $request->horainicio[$i];
            $horario->horafin =  $request->horafin[$i];
            $horario->created_by = $user->id;        
            $horario->save();        
        } 

        $this->guard()->login($user);
        //Enviamos correo para activar cuenta
        $this->enviarCorreoActivarCuentaEmpresa( $user );     
        Session::put( 'empresadescripcion',  $empresa->nombre );           

        return \Response::json( $user );
    
    }
  
    public function cambiaremailusuarios(CambiaremailCreateRequest $request, $user_id ){
    
            $user = User::findOrFail($user_id);
            $user->email =  $request->email;
            $user->save();      

            // ProcesssendmailJob::dispatch( $user );
            ProcesssendmailJob::dispatchNow( $user );
            // $this->enviarCorreoActivarCuentaEmpresa( $user ); 
      
            return back()->withErrors(['email'=>'Ingresa correo'])->withInput(request('email'));
      
    }

    private function enviarCorreoActivarCuentaEmpresa( $user ) {

        try {
            Mail::to( $user->email )
            ->cc("crisoper@gmail.com")
            ->send( new  ActivarcuentaempresaMail( $user ) );
        } catch (\Exception $e) {
            return null;
        }
       
    }

    public function confirmarcuenta(){        
       
        return view('publico.empresa.confirmarcuenta');
       
    }
    
 
    public function activarcuentatoken( Request $request ) {

        if ( $request->has("tokenactivation") ) {
            
            $usuario = User::where("remember_token", $request->tokenactivation ) ->first();

            if( $usuario ) {
                $usuario->email_verified_at = now();
                $usuario->save();
                
                $this->guard()->login($usuario);

                return view('publico.empresa.cuentaactivada');
            }

        }

        return "El token enviado no es valido";

    }
 
    public function vistaprevia(){
        

        return view('publico.empresa.preview');
    }

    public function consultaRuc(){
        require_once("./src/autoload.php");
	$cookie = array(
		'cookie' 		=> array(
			'use' 		=> true,
			'file' 		=> __DIR__ . "/cookie.txt"
		)
	);
	$config = array(
		'representantes_legales' 	=> true,
		'cantidad_trabajadores' 	=> true,
		'establecimientos' 			=> true,
		'cookie' 					=> $cookie
	);
	
	$sunat = new \Sunat\ruc( $config );
	
	$ruc = "20169004359";
	$dni = "44274795";
	
	$search1 = $sunat->consulta( $ruc );
    $search2 = $sunat->consulta( $dni );
    
    if( $search->success==false )
	{
		echo "ERROR : " . $search->message;
    }
    
    }

}
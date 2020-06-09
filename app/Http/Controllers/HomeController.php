<?php

namespace App\Http\Controllers;

use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;

use Spatie\Permission\Models\Role as Rol;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idempresa = session()->get('empresaactual');
        // $periodos = Periodo::where('empresa_id', $idempresa )->first();  
        $userEmpresa = Auth()->user()->empresas;
        $flag = "home";
        $empresas = $userEmpresa;
        $empresa = $userEmpresa->first();

        if (count($userEmpresa) != 0) {

            if (auth()->user()->hasRole('SuperAdministrador')) {
                Session::put('empresaactual', $empresa->id);
                Session::put('empresadescripcion', $empresa->nombre);
                return view('home', compact('flag'));
            } else {

                if (auth()->user()->hasRole('web_Administrador empresa')) {
                    if (count($userEmpresa) > 1) {

                        return view('admin.empresas.formseleccionarempresa', compact('empresas'));
                    } else {
                        Session::put('empresaactual', $empresa->id);
                        Session::put('empresadescripcion', $empresa->nombre);
                        return view('home', compact('flag'));
                    }
                } else {


                    $rol = auth()->user()->roles()->where("guard_name", "menu")->whereNotNull("paginainicio")->first();
                    if ($rol and Route::has($rol->paginainicio)) {
                        return redirect()->route($rol->paginainicio);
                    } else {

                        return view("layouts.paginas.mensajes.sinrol");
                    }
                }

                
            }
        } else {
            return redirect()->route('registrartuempresa');
        }
    }
}

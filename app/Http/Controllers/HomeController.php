<?php

namespace App\Http\Controllers;

use App\Models\Admin\Empresa;
use App\Models\Admin\Periodo;

use Spatie\Permission\Models\Role as Rol;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
      
        $empresasUser = Auth()->user()->empresas;

        $empresas = $empresasUser;
        $empresa = $empresasUser->first();
        
        if ( auth()->user()->hasRole('SuperAdministrador') ) {
            Session::put('empresaactual', $empresa->id);
            Session::put('empresadescripcion', $empresa->nombre);
            
            return view('home');
            
        }else if ( auth()->user()->hasRole('web_Repartidor') ) {
            Session::put('empresaactual', $empresa->id);
            Session::put('empresadescripcion', $empresa->nombre);
            $flag = "repartidor";
            return view('home');
        
        }else if (count($empresasUser) != 0 ) {

            if (auth()->user()->hasRole('SuperAdministrador')) {
                Session::put('empresaactual', $empresa->id);
                Session::put('empresadescripcion', $empresa->nombre);
               
                return view('home');
            } else {

                if (auth()->user()->hasRole('menu_Administrador empresa')) {
                    if (count($empresasUser) > 1) {

                        return view('admin.empresas.formseleccionarempresa', compact('empresas'));
                    } else {
                        Session::put('empresaactual', $empresa->id);
                        Session::put('empresadescripcion', $empresa->nombre);
                      
                        $email_verified  = User::findOrFail( Auth()->user()->id );
                        if ( $email_verified->email_verified_at != null || $email_verified->email_verified_at != '') {
                            
                            return view('home');
                        }
                        else{
                            return redirect()->route('confirmarcuenta');   
                        }
                    }
                 } else {
                    
                    $rol = auth()->user()->roles()->where("guard_name", "menu")->whereNotNull("paginainicio")->first();
                    if ($rol and Route::has($rol->paginainicio)) {
                        return redirect()->route($rol->paginainicio);
                    } else {
                        return view("includes.sinrol");
                    }
                }
            }
        } else {
            if (auth()->user()->hasRole('web_Comprador')) {
                if ( auth()->user()->email_verified_at != '' || auth()->user()->email_verified_at != null )  {                    
                    return view("publico.inicio.index");
                }else{
                    return view('publico.mail.confirmarcuentaComprador');
                }
            } else {
                return redirect()->route('registrartuempresa');
            }
        
            
        }
    }
}

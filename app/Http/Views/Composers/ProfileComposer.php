<?php

namespace App\Http\Views\Composers;

use App\User as Usuario;
use App\Models\Admin\Menus\Menu;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class ProfileComposer {
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;
    protected $roles;
    protected $permisos;
    
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct( Usuario $users )
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   
        if (Auth::check()) {
            $usuario = Auth::user();
            $_usuarioActual = Usuario::where( 'id', '=', $usuario->id )->first();
            
            if( $_usuarioActual->hasRole('SuperAdministrador') ) {                  
                //Acceso total, consultamos todos los permisos
                $_permisosUsuarioActual = Permission::whereIn('guard_name', ['menu'])->pluck('name');
            }
            else {                                                              
                //Permisos explicitos del usuario segun sus roles
                $_permisosUsuarioActual = $_usuarioActual->getAllPermissions()->whereIn('guard_name', ['menu'])->pluck('name');
            }
        }
        else {
            $_usuarioActual = null;
            $_permisosUsuarioActual = [];
        }

        $_allMenus = Menu::whereNull('parent_id')
                            ->with('submenus')
                            ->orderBy('orden')
                            ->get();

        $view->with('_permisosUsuarioActual', $_permisosUsuarioActual );
        $view->with('_allMenus', $_allMenus );

        

    }
}
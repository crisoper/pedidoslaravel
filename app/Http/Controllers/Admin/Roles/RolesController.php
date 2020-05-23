<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\RolCreateRequest;
use App\Models\Admin\Menus\Menu;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as Rol;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;

class RolesController extends Controller
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
        //Es un usuario administrador, mostramos todos los registros
        if (!empty(request()->buscar)) 
        {
            $roles = Rol::where('name', 'like', '%'.request()->buscar.'%' )
                    ->orderBy('guard_name', 'desc')
                    ->paginate(10);
            return view('admin.roles.roles.index', compact('roles'));
        }
        else
        {
            $roles = Rol::orderBy('guard_name', 'desc')->paginate(10);
            return view('admin.roles.roles.index', compact('roles'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolCreateRequest $request)
    {

        $rol = new Rol();
        $rol->guard_name = "web";//$request->input('guard_name');
        $rol->name = 'web_'.str_replace("_", "", $request->input('name'));
        $rol->save();
        
        $rol = new Rol();
        $rol->guard_name = "menu";//$request->input('guard_name');
        $rol->name = 'menu_'.str_replace("_", "", $request->input('name'));
        $rol->save();

        return redirect()->route('roles.index')->with('info', 'Registro creado');

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
        $rol = Rol::findOrFail( $id );
        
        // return view('roles.edit', compact('rol', 'permissions', 'namepermissions', 'esquemas'));
        return view('admin.roles.roles.edit', compact('rol'));
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
        $rol = Rol::findOrFail( $id );
        // $rol->name = $request->input('name');
        $rol->name = $rol->guard_name.'_'.str_replace("_", "", str_replace("menu_", "", str_replace("web_", "", $request->input('name') ) ) );
        
        if ( $request->has("paginainicio") ) {
            $rol->paginainicio = $request->input("paginainicio");
        } 

        $rol->save();
        
        return redirect()->route('roles.index')->with('info', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function getpermissions($id) 
    {
        $rol = Rol::with('permissions')->findOrFail($id);
        return $rol;
        $permissions = Permission::get();
        $namepermissions = $this->namepermissions( Permission::get()->pluck('name') );

        return view('roles.permissions', compact('permissions', 'rol', 'namepermissions'));

    }


    public function namepermissions( $permissions ) 
    {
        $namedpermissions = [];
        foreach( $permissions as $permission )
        {
            $namedpermissions[] = substr($permission, strpos($permission, ".") + 1, strlen($permission) );
        }

        return  array_unique( $namedpermissions );
    }



    //Obtener el menu actual del usuario
    public function getmenus( $id ) 
    {

        $rol = Rol::with('permissions')->findOrFail($id);

        $menus = Menu::whereNull('parent_id')
                            ->with('submenus')
                            ->orderBy('orden')
                            ->get();

        $permissions = Permission::whereIn('guard_name', ['menu'])->get();
        $namepermissions = $this->namepermissions( 
                                    Permission::whereIn('guard_name', ['menu'])
                                    ->get()
                                    ->pluck('name') 
                                );

        return view( 'admin.roles.roles.menus', compact('permissions', 'rol', 'namepermissions', 'menus') );

    } 


    /*
    *   Guardando la estructura del menu de un rol
    *
    */
    public function savemenus(Request $request, $id)
    {

        // return $request->menus;

        $rol = Rol::findOrFail( $id );

        if ($request->has('menus') ) 
        {
            //Quitando todos los permisos
            $rol->revokePermissionTo( 
                                    Permission::whereIn('guard_name', ['menu'])
                                    ->get()
                                    ->pluck('name')
                                    ->toArray() 
                                );
            
            //Asignando todos los permisos actualizados
            $rol->givePermissionTo($request->input('menus'));
            
        }

        return redirect()->route('roles.index')->with('info', 'Menu asignado');

    }


    public function getpermisos ( $id ) 
    {
        $rol = Rol::findOrFail( $id );
        
        $permissions = Permission::whereIn('guard_name', ['web'])
        // ->where('name', 'like', $buscarEsquema.'%' )
        ->orderBy('name')
        ->select("name")
        ->get();  

        return view('admin.roles.roles.permisos', compact('rol', 'permissions') );

    }


    public function savepermisos( Request $request, $id ) 
    {
        $rol = Rol::findOrFail( $id );

        $rol->revokePermissionTo( Permission::whereIn('guard_name', ['web'])->get()->pluck('name')->toArray() );
        // $rol->revokePermissionTo( Permission::whereIn('guard_name', ['web'])->where('name', 'like', $request->input('esquema').'.%' )->get()->pluck('name')->toArray() );

        //Asignando todos los permisos actualizados del esquema seleccionado
        $rol->givePermissionTo($request->input('permisos'));

        return redirect()->route('roles.index')->with('info', 'Permisos asignados');

    }

}



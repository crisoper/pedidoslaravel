@extends('layouts.admin.admin')

@section('contenido')

{{-- @can('public.menus.listar') --}}

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                   
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Menus</h3>
                            <p class="mb-2"><small>Luego de crear o actualizar un menu, no olvide Actualizar Permisos!!!.</small></p>                   
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 mb-3">
                            <form id="form-buscar-menus" class="" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
    
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-menus').submit();">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-4 justify-content-end text-right mb-3">
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Operaciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        {{-- @can('public.menus.crear') --}}
                                            <a href="{{ route('menus.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                        {{-- @endcan --}}
                                    </div>
                                </div>
                            </div>
    
                            {{-- @can('public.permissions.crear') --}}
                                <a class="btn btn-danger text-white deletepermissions" href="#" onclick="event.preventDefault(); document.getElementById('form.permissions.generarmasivamente.menus').submit();">Actualizar permisos</a>
    
                                <form id="form.permissions.generarmasivamente.menus" action="{{ route('permissions.generarmasivamente.menus') }}" method="POST" style="display: none;">
                                    {!! csrf_field() !!}
                                </form>
                            {{-- @endcan --}}
    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Menu padre</th>
                                            <th>Nombre</th>
                                            <th>Orden</th>
                                            <th>URL nombre</th>
                                            <th class="text-center">URL link</th>
                                            <th colspan="2" class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td> 
                                                    {!! $menu->menupadre ? $menu->menupadre->icono : '' !!}  {{ $menu->menupadre ?  $menu->menupadre->nombre : '' }}
                                                </td>
                                                <td>
                                                    {!! $menu->icono !!} {{ $menu->nombre }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-infoa right">{{ $menu->orden }}</span>
                                                </td>
                                                
                                                @if ( Route::has( $menu->url ) ) 
                                                    <td>  
                                                        {{ $menu->url }} 
                                                    </td>
                                                    <td class="text-center">  
                                                        <a class="text-info" href="{{ route($menu->url) }}" target="_blank"><i class="fas fa-link"></i></a> 
                                                    </td>
                                                @else
                                                    <td>  
                                                        {{ $menu->url }} 
                                                    </td>
                                                    <td> 
                                                    </td>
                                                @endif
                                                
                                                <td class="text-center">
                                                    @can('public.menus.editar')
                                                        <a href="{{ route('menus.edit', $menu->id) }}"><i class="fas fa-edit"></i></a>
                                                    @endcan
                                                </td>
                                                <td class="text-center">
                                                    @can('public.menus.eliminar')
                                                        <form id="form.menus.delete.{{$menu->id}}" action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                                            {!! method_field('DELETE') !!}
                                                            {!! csrf_field() !!}
                                                            <a 
                                                            class="text-danger menus" 
                                                            href="#"
                                                            onclick="event.preventDefault(); document.getElementById('form.menus.delete.{{$menu->id}}').submit();"
                                                            >
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </form>
                                                    @endcan
                                                </td>                                        
                                            </tr>
        
                                            @foreach ( $menu->submenus as $submenu )
                                                @include('admin.menus.menus.submenus', ['submenu' => $submenu])
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    {!! $menus->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- @endcan --}}

@endsection

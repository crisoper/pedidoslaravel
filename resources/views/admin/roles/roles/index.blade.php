@extends('layouts.admin.admin')

@can('roles.listar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                   
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Roles</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 col-md-9 mb 3">
                        <form id="form-buscar-roles" class=" {{-- search-form --}}" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-roles').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-right">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operaciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                @can('roles.crear')
                                    <a href="{{ route('roles.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                @endcan

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>
                                        <th>Pagina inicio</th>
                                        <th colspan="4" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($roles as $rol)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + $roles->perPage() * ($roles->currentPage() - 1) }}
                                        </td>
                                        <td>{{ $rol->guard_name }}</td>
                                        
                                        <td>{{ str_replace("menu_", "", str_replace("web_", "", $rol->name ) ) }}</td>
                                        <td>
                                            @if ( Route::has( $rol->paginainicio ) )
                                                <a href="{{ route( $rol->paginainicio ) }}" target="_blank">Ir</a>
                                            @endif
                                        </td>
                                        
                                            
                                        @can('role_has_permissions.crear')
                                                
                                            @if ( $rol->guard_name  == 'web')
                                                <td class="text-center">
                                                    @if ( $rol->name != 'SuperAdministrador')
                                                    <a href="{{ route('roles.getpermisos', $rol->id) }}">Asignar permisos</a>
                                                    @endif
                                                </td>
                                            @endif
                                            

                                            @if ( $rol->guard_name  == 'menu')
                                                <td class="text-center">
                                                    @if ( $rol->name != 'SuperAdministrador')
                                                        <a href="{{ route('roles.generarmenus', $rol->id) }}">Generar menu</a>
                                                    @endif
                                                </td>
                                            @endif
                                            
                                        @endcan

                                        @can('roles.editar')
                                            <td class="text-center">
                                                @if ( $rol->name != 'SuperAdministrador')
                                                    <a href="{{ route('roles.edit', $rol->id) }}"><i class="fas fa-edit"></i></a>
                                                @endif
                                            </td>

                                        @endcan
                                        <td class="text-center">
                                            @if ( $rol->name != 'SuperAdministrador')
                                                @can('roles.eliminar')
                                                    <form id="form.roles.delete.{{$rol->id}}" action="{{ route('roles.destroy', $rol->id) }}" method="POST">
                                                        {!! method_field('DELETE') !!}
                                                        {!! csrf_field() !!}
                                                        <a 
                                                        class="text-danger deleteroles" 
                                                        href="#"
                                                        onclick="event.preventDefault(); document.getElementById('form.roles.delete.{{$rol->id}}').submit();"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </form>
                                                @endcan
                                            @endif
                                        </td>                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $roles->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@else
    @include('layouts.paginas.mensajes.sinpermiso')
@endcan

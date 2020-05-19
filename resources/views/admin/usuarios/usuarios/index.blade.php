@extends('layouts.admin.admin')

@can('users.listar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            
                            <h3>Usuarios</h3>
                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    
                    <div class="col-12 col-md-9 mb-3">
                        <form id="form-buscar-usuarios" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-usuarios').submit();">
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

                                @can('users.crear')
                                    <a href="{{ route('usuarios.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                @endcan
                                
                                @can('users.exportar')
                                    <form action="{{ route("export.usuarios.index") }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="buscar_exportar" value="{{request()->query('buscar')}}">
                                        <button type="submit" class="dropdown-item"><i class="fas fa-file-excel text-success"></i> Exportar</button>
                                    </form>
                                @endcan
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + $usuarios->perPage() * ($usuarios->currentPage() - 1) }}
                                        </td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-center">
                                            @if ( !$usuario->hasRole('SuperAdministrador') )
                                                @can('model_has_roles.crear')
                                                    <a 
                                                    class="text-info" 
                                                    href="{{ route('usuarios.roles', $usuario->id) }}"
                                                    >
                                                    Asignar roles
                                                    </a>
                                                @endcan
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ( !$usuario->hasRole('SuperAdministrador') )
                                                @can('users.editar')
                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ( !$usuario->hasRole('SuperAdministrador') )
                                                @can('users.eliminar')
                                                    <form id="form.usuarios.delete.{{$usuario->id}}" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                        {!! method_field('DELETE') !!}
                                                        {!! csrf_field() !!}
                                                        <a 
                                                        class="text-danger" 
                                                        href="#"
                                                        onclick="event.preventDefault(); document.getElementById('form.usuarios.delete.{{$usuario->id}}').submit();"
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
                        {!! $usuarios->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@else
    @include('includes.sinpermiso')
@endcan
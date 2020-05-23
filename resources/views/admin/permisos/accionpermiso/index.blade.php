
@extends('layouts.admin.admin')
@can('accionpermisos.listar')
@section('tituloseccion', 'Admistracion')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Acción permisos</h3>                  
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('permissions.index')}}"><h4><i class="fas fa-reply "></i></h4></a>
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
                                @can('accionpermisos.crear')
                                    <a href="{{ route('accionpermisos.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
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
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($accionpermisos as $usuario)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + $accionpermisos->perPage() * ($accionpermisos->currentPage() - 1) }}
                                        </td>
                                        <td>
                                            {{ $usuario->nombre }}
                                        </td>
                                        <td class="text-center">
                                            @if (   ('SuperAdministrador') )
                                                <a href="{{ route('accionpermisos.edit', $usuario->id) }}"><i class="fas fa-edit"></i></a>
                                            @else
                                                @can('usuarios.accionpermisos.editar')
                                                    <a href="{{ route('accionpermisos.edit', $usuario->id) }}"><i class="fas fa-edit"></i></a>
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
                        {!! $accionpermisos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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
{{-- @extends('layouts.app') --}}
@extends('layouts.adminlte3.adminlte3')

@section('tituloseccion', 'Admistracion')

@section('contenido')


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Accion permisos</h3>
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

                                {{-- @can('accionpermisos.exportarexcel')
                                    <form action="{{ route('export.accionpermisos.index') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="buscar_exportar" value="{{request()->query('buscar')}}">
                                        <button type="submit" class="dropdown-item">Exportar</button>
                                    </form>
                                @endcan --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
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


@section('scriptspersonalizados')


@endsection


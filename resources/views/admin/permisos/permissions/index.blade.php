{{-- @extends('layouts.app') --}}
@extends('layouts.adminlte3.adminlte3')

@can('permissions.listar')

@section('contenido')
    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                   
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Permisos</h3>                    
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">

                        <div class="col-12 col-md-9 mb-3">
                            <form id="form-buscar-permissions" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-permissions').submit();">
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

                                    @can('permissions.crear')
                                        <a href="{{ route('permissions.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form.permissions.generarmasivamente').submit();"><i class="fas fa-plus-square text-warning"></i> Crear masivamente</a>
                                    <form id="form.permissions.generarmasivamente" action="{{ route('permissions.generarmasivamente') }}" method="POST" style="display: none;">{!! csrf_field() !!}</form>
                                    @endcan

                                    @can('permissions.exportar')
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="buscar_exportar" value="{{request()->query('buscar')}}">
                                            <button type="submit" class="dropdown-item"><i class="fas fa-file-excel text-success"></i> Exportar</button>
                                        </form>
                                    @endcan
                                    
                                </div>
                            </div>
                            @can('permissions.crear')
                           
                        @endcan
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombre</th>
                                        <th>Guard</th>
                                        <th colspan="2" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($permissions as $permiso)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + $permissions->perPage() * ($permissions->currentPage() - 1) }}
                                        </td>
                                        <td>{{ $permiso->name }}</td>
                                        <td>{{ $permiso->guard_name }}</td>
    
                                        <td class="text-center">
                                            @can('permissions.editar')
                                                <a href="{{ route('permissions.edit', $permiso->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                        </td>
                                        <td class="text-center">
                                            @can('permissions.eliminar')
                                                <form id="form.permissions.delete.{{$permiso->id}}" action="{{ route('permissions.destroy', $permiso->id) }}" method="POST">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <a 
                                                    class="text-danger deletepermissions" 
                                                    href="#"
                                                    onclick="event.preventDefault(); document.getElementById('form.permissions.delete.{{$permiso->id}}').submit();"
                                                    >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </form>
                                            @endcan
                                        </td>
                                            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $permissions->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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
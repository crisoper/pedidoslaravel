@extends('layouts.adminlte3.adminlte3')


@can('periodos.listar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Periodos</h3>
                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-xs-12 col-sm-9 mb-3">
                        <form id="form-buscar-periodos" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-periodos').submit();">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-3 mb-3 text-right">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Operaciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @can('periodos.crear')
                                    <a href="{{ route('periodos.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Empresa</th>
                                        <th>Nombre</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Estado</th>
                                        <th colspan="2" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                    <tr>
                                        <td>{{ $periodo->id }}</td>
                                        <td>{{ $periodo->empresa ? $periodo->empresa->nombre : '' }}</td>
                                        <td>{{ $periodo->nombre }}</td>
                                        <td>{{ $periodo->inicio }}</td>
                                        <td>{{ $periodo->fin}}</td>
                                        <td>{{ $periodo->estado == 1 ? 'Activo' : 'Inactivo' }}</td>

                                        @can('periodos.editar')
                                            <td class="text-center">
                                                <a href="{{route('periodos.edit',$periodo->id)}}" class="text-primary"><i class="fas fa-edit"></i></a>
                                            </td>
                                        @endcan
                                        
                                        <td class="text-center">
                                        @can('periodos.eliminar')
                                            <form id="form.periodos.delete.{{$periodo->id}}" action="{{ route('periodos.destroy', $periodo->id) }}" method="POST">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.periodos.delete.{{$periodo->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
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
                        {!! $periodos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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
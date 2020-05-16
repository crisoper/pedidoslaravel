@extends('layouts.admin.admin')

@can('empresarubros.listar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Rubros Empresa</h3>                          
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}"><h4><i class="fas fa-reply "></i></h4></a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-xs-12 col-sm-9 mb-3">
                        <form id="form-buscar-empresas" action="">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                                <div class="input-group-append">
                                    <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-empresas').submit();">
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
                                @can('empresarubros.crear')
                                    <a href="{{ route('empresarubros.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
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
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th colspan="2" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresarubros as $empresarubro)
                                    <tr>
                                        <td>{{ $empresarubro->id }}</td>
                                        <td>{{ $empresarubro->nombre }}</td>
                                        <td>{{ $empresarubro->descripcion }}</td>

                                        @can('empresarubros.editar')
                                            <td class="text-center">
                                                <a href="{{route('empresarubros.edit',$empresarubro->id)}}" class="text-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        @endcan

                                        <td class="text-center">
                                            @can('empresarubros.eliminar')
                                                <form id="form.empresarubros.delete.{{$empresarubro->id}}" action="{{ route('empresarubros.destroy', $empresarubro->id) }}" method="POST">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.empresarubros.delete.{{$empresarubro->id}}').submit();">
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
                    <div>
                        {!! $empresarubros->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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
@extends('layouts.admin.admin')

@can('empresas.listar')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Empresas</h3>
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
                                @can('empresas.crear')
                                    <a href="{{ route('empresas.create') }}" class="dropdown-item"><i class="fas fa-plus-square text-success"></i> Crear</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Rubro</th>
                                        <th>Ruc</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Logo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td>{{ $empresa->id }}</td>
                                            <td>{{ $empresa->rubro->nombre }}</td>
                                            <td>{{ $empresa->ruc }}</td>
                                            <td>{{ $empresa->nombre }}</td>
                                            <td>{{ $empresa->direccion }}</td>
                                            <td>
                                                <img id="empresaLogo" src="{{ asset( Storage::disk('usuarios')->url('empresaslogos/').$empresa->logo ) }}" alt="{{$empresa->logo}}">
                                                {{-- <img id="empresaLogo" src="{{ Storage::url("empresaslogos/".$empresa->logo)}}" alt="{{$empresa->logo}}"> --}}
                                            </td>
                                            <td class="text-center">
                                                <a class="text-info" href="{{ route('empresas.agregarcomprobantetipos', $empresa->id) }}">Comprobantes</a>
                                            </td>
                                            @can('empresas.editar')
                                                <td class="text-center">
                                                    <a href="{{route('empresa.editar',$empresa->id)}}" class="text-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                            
                                            <td class="text-center">
                                                @can('empresas.eliminar')
                                                    <form id="form.empresas.delete.{{$empresa->id}}" action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                                                        {!! method_field('DELETE') !!}
                                                        {!! csrf_field() !!}
                                                        <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('form.empresas.delete.{{$empresa->id}}').submit();">
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
                        {!! $empresas->appends(request()->query() )->links('pagination::bootstrap-4') !!}
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
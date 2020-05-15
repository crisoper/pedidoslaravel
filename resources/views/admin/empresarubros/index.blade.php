@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        Rubros de empresas
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-12 col-lg-8">
                                <form id="form-buscar-menus" class="" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded-1" placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">
        
                                        <div class="input-group-append">
                                            <a href="#" class="btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('form-buscar-menus').submit();">
                                                <i class="fas fa-search"></i> Buscar
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-12 col-lg-4 text-right">
                                <a href="{{ route("empresarubros.create") }}" class="btn btn-outline-info">Nuevo</a>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-12 table-responsive">
                                
                                <table class="table table-light" name="listaempresarubros" id="listaempresarubros">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nro</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th colspan="2">Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($empresarubros as $rubro)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration + $empresarubros->perPage() * ($empresarubros->currentPage() - 1) }}
                                                </td>
                                                <td>
                                                    {{ $rubro->nombre }}
                                                </td>
                                                <td>
                                                    <small>{{ $rubro->descripcion }}</small>
                                                </td>
                                                <td>
                                                    <a href="{{ route('empresarubros.edit', $rubro->id) }}" class="text-info">Editar</a>
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                
                            </div>
                            
                            <div class="col-12">
                                {!! $empresarubros->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin.admin')

@can('empresas.crear')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Crear Empresa</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('empresas.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7 mx-auto">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="rubro_id">Rubro:</label>
                                        <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                            <option value="">Seleccionar Rubro</option>
                                            @foreach ($empresarubros as $empresarubro)
                                                <option value="{{ $empresarubro->id }}">{{ $empresarubro->nombre }}</option>
                                            @endforeach
                                            <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ruc">Ruc:</label>
                                        <input type="text" name="ruc" id="ruc" maxlength="11" class="form-control">
                                        <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control">
                                        <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="paginaweb">Página Web:</label>
                                        <input type="text" name="paginaweb" id="paginaweb" class="form-control">
                                        <span class="text-danger">{{ $errors->first('paginaweb') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-auto">
                                <div class="form-row">    
                                    <div class="form-group col-12">
                                        <div class="cajaInputAgregarLogo text-center">
                                            <label for="logo">
                                                <div class="cajaNombreLogo" data-text="">Seleccionar Logo</div>
                                            </label>
                                            <input type="file" name="logo" id="logo" data-initial-preview="#" accept="image/*">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-row text-center">
                                    <div class="form-group col-12">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="{{route('empresas.index')}}" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@else
    @include('includes.sinpermiso')
@endcan
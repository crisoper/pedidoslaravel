@extends('layouts.admin.admin')

@can('empresas.crear')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Editar Empresa</h3>
                </div>

                @php
                $usuario = Auth()->user()
                @endphp

                <div class="card-body">
                    <form id="form_UpdateRegistroEmpresa" action='' method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-12 col-md-7 col-lg-8">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="rubro_id">Rubro</label>
                                        <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                            <option value="">Rubro de negocio</option>
                                            @foreach ($empresarubros as $empresarubro)

                                            <option value="{{ $empresarubro->id }}" @if ( $empresarubro->id ==
                                                $empresa->rubro_id )
                                                selected
                                                @endif
                                                >
                                                {{ $empresarubro->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="ruc">Ruc:</label>
                                        <input type="hidden" name="empresaid" value="{{ $empresa->id }}">
                                        <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                            class="form-control " value="{{$empresa->ruc}}" placeholder="Ruc">

                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="nombre">Nombre o Razón Social</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{$empresa->nombre}}" placeholder="Nombre o Razón Social">

                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="nombrecomercial">Nombre Comercial</label>
                                        <input type="text" name="nombrecomercial" id="nombrecomercial"
                                            class="form-control" value="{{ $empresa->nombrecomercial }}"
                                            placeholder="Nombre Comercial">

                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $empresa->telefono }}" placeholder="Teléfono" minlength="9" maxlength="9">
                                    </div>
                                    <div class="form-group col-12 col-md-8">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $empresa->direccion }}" placeholder="Dirección">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label for="departamentoid">Departamento</label>
                                        <select name="departamentoid" id="departamentoid"
                                            class="form-control select2" autofocus>
                                            <option value="">Departamento</option>
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}" @if ( $departamento->id ==
                                                $empresa->departamento_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $departamento->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('departamentoid') }}</span>

                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="provinciaid">Provincia</label>
                                        <select name="provinciaid" id="provinciaid" class="form-control select2"
                                            autofocus>
                                            <option value="">Provincia</option>
                                            @foreach ($provincias as $provincia)
                                            <option value="{{ $provincia->id }}" @if ( $provincia->id ==
                                                $empresa->provincia_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $provincia->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('provinciaid') }}</span>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="distritoid">Distrito</label>
                                        <select name="distritoid" id="distritoid" class="form-control "
                                            autofocus>
                                            <option value="">Distrito</option>
                                            @foreach ($distritos as $distrito)
                                            <option value="{{ $distrito->id }}" @if ( $distrito->id ==
                                                $empresa->distrito_id )
                                                selected = 'selected'
                                                @endif
                                                >
                                                {{ $distrito->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('distritoid') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-5 col-lg-4 mx-auto">
                                <div class="file-loading">
                                    <input id="logo" name="logo" type="file" accept="image/*">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        @foreach ($errors as $error)
                                        <span class="text-danger">{{ $error}}</span>
                                        @endforeach
                                    </div>
    
                                    @csrf
                                    <div class="form-group col-12 text-center">
                                        <button type="button" class="btn btn-primary" id="enviarFormActualizandoDatos">
                                            <span class="spinner-border spinner-border-sm spinnerr" role="status" aria-hidden="true" style="display: none"></span>
                                            Guardar
                                        </button>
                                        <a href="{{route('configuracionempresa.index')}}" class="btn btn-danger">Cancelar</a>
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


<script>
    $(document).ready(function() {
        $("#logo").fileinput({
            maxFileCount: 1,
            allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
            
            browseClass: "btn btn-secondary",
            browseLabel: "Seleccionar",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",

            removeClass: "btn btn-warning",
            removeLabel: "Eliminar",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",

            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
            
            // showCaption: false,
            // showRemove: false,
            showUpload: false,
            theme: "fas",
            language: "es",
        });
    });
</script>

@endsection

@section('scripts')
    @include('admin.empresas.js')
@endsection


@else
    @include('includes.sinpermiso')
@endcan
@extends('layouts.admin.admin')

@section('contenido')

<div class="container-fluid ">


    <div class="row d-flex justify-content-center ">


        <div class="col-11">
            @php
            $usuario = Auth()->user()
            @endphp

            <form id="form_UpdateRegistroEmpresa" action='' method="POST" enctype="multipart/form-data">

                <div class="row mt-3 ">
                    <div class="col-12  mx-auto ">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <span>Editar los datos de empresa</span>
                            </div>

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="col-md-12 col-sm-12 d-flex flex-wrap">
                                            <div class="form-group col-md-6 col-sm-12">
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
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="ruc">Ruc:</label>
                                                <input type="hidden" name="empresaid" value="{{ $empresa->id }}">
                                                <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                                    class="form-control " value="{{$empresa->ruc}}" placeholder="Ruc">

                                            </div>

                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="nombre">Nombre o Razón Social</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    value="{{$empresa->nombre}}" placeholder="Nombre o Razón Social">

                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="nombrecomercial">Nombre Comercial</label>
                                                <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                    class="form-control" value="{{ $empresa->nombrecomercial }}"
                                                    placeholder="Nombre Comercial">

                                            </div>
                                            <div class="form-group col-md-12 col-sm-12">
                                                <label for="direccion">Dirección</label>
                                                <input type="text" name="direccion" id="direccion" class="form-control"
                                                    value="{{ $empresa->direccion }}" placeholder="Dirección">
                                            </div>
                                        </div>
                                        {{-- <img class='img-thumbnail' src='{{URL::to('/') }}/storage/'
                                        data-initial-preview='#' accept='image/*' > --}}
                                        <div class="form-row">
                                            <div class="form-group col-md-4 col-sm-12">
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
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="provinciaid">Departamento</label>
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
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="distritoid">Departamento</label>
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
                                    <div class="col-md-12 col-lg-4 mx-auto">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="cajaInputAgregarLogo text-center">
                                                    <label for="logo">
                                                        <div class="cajaNombreLogo" data-text="">Seleccionar
                                                            Logo
                                                        </div>
                                                    </label>
                                                    <input type="file" name="logo" id="logo" data-initial-preview="{{ asset( Storage::disk('usuarios')->url('empresaslogos/').$empresa->logo ) }}"
                                                        accept="image/*">
                                                </div>

                                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>{{--Fin Cardbpdy --}}
                        </div>

                    </div>
                </div>

                <div class="row ">
                    <div class="col-12 mt-3">
                        <div class="form-row text-center">
                            <div class="form-group col-5 d-flex flex-nowrap">
                            </div>
                            <div class="form-group col-7 d-flex flex-nowrap">

                                <div>

                                    @foreach ($errors as $error)

                                    <span class="text-danger">{{ $error}}</span>
                                    @endforeach
                                </div>
                                @csrf

                                <div class="form-group col-6">
                                    <button type="button" class="btn btn-primary btn-block"
                                        id="enviarFormActualizandoDatos">
                                        <span class="spinner-border spinner-border-sm spinnerr" role="status"
                                            aria-hidden="true" style="display: none"></span>
                                        Guardar
                                    </button>
                                </div>
                                <div class="form-group col-6">
                                    <a href="{{route('configuracionempresa.index')}}"
                                        class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection
    @section('scripts')
    @include('admin.empresas.js')
    @endsection
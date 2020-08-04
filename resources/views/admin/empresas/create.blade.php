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
                    <form id="form_nuewbusiness"  method="POST" enctype="multipart/form-data">

                        <div class="row mt-3 ">
                            <div class="col-12  mx-auto ">
                                <div class="form-row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="col-md-12 col-sm-12 d-flex flex-wrap">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="rubro_id">Rubro</label>
                                                <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                                    <option value="">Rubro de negocio</option>
                                                    @foreach ($empresarubros as $empresarubro)

                                                    <option 
                                                        value="{{ $empresarubro->id }}"
                                                        {{ old('rubro_id') == $empresarubro->id ? 'selected' : ''}}    
                                                    >
                                                        {{ $empresarubro->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="ruc">Ruc:</label>                                                
                                                <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                                    class="form-control " value="{{old('')}}" placeholder="Ruc">
                                                    <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                            </div>

                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="razonsocial">Nombre o Razón Social</label>
                                                <input type="text" name="razonsocial" id="razonsocial" class="form-control"
                                                    value="{{old('razonsocial')}}" placeholder="Nombre o Razón Social">
                                                    <span class="text-danger">{{ $errors->first('razonsocial') }}</span>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="nombrecomercial">Nombre Comercial</label>
                                                <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                    class="form-control" value="{{ old('nombrecomercial') }}"
                                                    placeholder="Nombre Comercial">
                                                    <span class="text-danger">{{ $errors->first('nombrecomercial') }}</span>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="telefono">Teléfono</label>
                                                <input type="text" name="telefono" id="telefono" class="form-control"
                                                    value="{{ old('telefono') }}" placeholder="Teléfono">
                                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                            </div>
                                            <div class="form-group col-md-8 col-sm-12">
                                                <label for="direccion">Dirección</label>
                                                <input type="text" name="direccion" id="direccion" class="form-control"
                                                    value="{{ old('direccion') }}" placeholder="Dirección">
                                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                            </div>

                                            {{-- <img class='img-thumbnail' src='{{URL::to('/') }}/storage/'
                                            data-initial-preview='#' accept='image/*' > --}}

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="departamentoid">Departamento</label>
                                                <select name="departamentoid" id="departamentoid"
                                                    class="form-control select2" autofocus>
                                                    <option value="">Departamento</option>
                                                    @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}"
                                                        {{ old('departamentoid') == $departamento->id ? 'selected' : ''}}    
                                                        >
                                                        {{ $departamento->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('departamentoid') }}</span>

                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="provinciaid">Provincia</label>
                                                <select name="provinciaid" id="provinciaid" class="form-control select2"
                                                    autofocus>
                                                    <option value="">Provincia</option>
                                                    @foreach ($provincias as $provincia)
                                                    <option value="{{ $provincia->id }}"
                                                        {{ old('provinciaid') == $provincia->id ? 'selected' : ''}}    
                                                        >
                                                        {{ $provincia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('provinciaid') }}</span>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <label for="distritoid">Distrito</label>
                                                <select name="distritoid" id="distritoid" class="form-control "
                                                    autofocus>
                                                    <option value="">Distrito</option>
                                                    @foreach ($distritos as $distrito)
                                                    <option value="{{ $distrito->id }}"
                                                        {{ old('distritoid') == $distrito->id ? 'selected' : ''}}    
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
                                                    <input type="file" name="logo" id="logo" data-initial-preview="#"
                                                        accept="image/*">
                                                    </div>
                                                 
                                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-12 mt-3">
                                <div class="form-row text-center">
                                    <div class="form-group col-5 d-flex flex-nowrap">
                                    </div>
                                    <div class="form-group col-7 d-flex flex-nowrap">
                                      

                                        <div class="form-group col-6">
                                            @csrf
                                            <button type="button" class="btn btn-primary btn-block" id="btn_postnewbusiness">
                                                <span class="spinner-border spinner-border-sm spinnerr" role="status"
                                                    aria-hidden="true" style="display: none"></span>
                                                Guardar
                                            </button>
                                        </div>
                                        <div class="form-group col-6">
                                            <a href="{{route('empresas.index')}}"
                                                class="btn btn-danger btn-block">Cancelar</a>
                                        </div>
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

@section('scripts')
@include('admin.empresas.js')
@endsection

@else
@include('includes.sinpermiso')
@endcan
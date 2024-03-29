@extends('layouts.publico.registraempresa')

@include('publico.empresa.css')

@section('contenido')

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 d-flex flex-wrap">

            <div id="texto" class=" col-sm-12 col-md-7">
                <div class=" titulo mt-3">
                   
                        <strong>Registra tu negocio <span class="text-resaltado ">Completamente gratis</span> e incrementa tus
                        ingresos vendiendo en <span class="text-resaltado">{{config('app.name') }}</span></strong>
                   
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex flex-wrap align-items-center">
                        <div class="col-4">
                            <img src="https://img.icons8.com/plasticine/100/000000/total-sales.png" />
                            <p>
                                Crese con nosotros. Para publicar tus productos, registra tu negocio.
                            </p>
                        </div>

                        <div class="col-4">
                            <img src="https://img.icons8.com/bubbles/100/000000/group.png" />
                            <p>
                                Hacercate más a la gente y gana mas clientes, promociona tus productos y vende por
                                internet.
                            </p>
                        </div>

                        <div class="col-4">

                            <img src="https://img.icons8.com/color/96/000000/motorcycle-delivery-multiple-boxes.png"/>
                            <p>
                                Olvidate de las entregas, PedidosApp lo hará por ti, 
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="mt-auto p-2" id="apps">
                    <a class="btn btn_app_android p-0" href="#">
                        <img src="{{asset('pedidos/image/appmovil/googleplay.png')}}" alt="">
                </a>
                <a class="btn btn_app_ios p-0" href="#">
                    <img src="{{asset('pedidos/image/appmovil/appstore.png')}}" alt="">
                </a>
            </div> --}}

        </div>
        <div id="container_left" class="col-sm-12 col-md-5 p-3">
            <div class="formlario p-3">  
            <form id="formularioRegistroEmpresa" action="{{route('nuevaempresa.store')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @php
                $usuario = Auth()->user()
                @endphp

                <div class="form-row  pt-3">
                    <div class="col-md-12 col-sm-12  mx-auto ">
                        <div class="col-12">
                            <span>
                                1. Datos de la empresa
                            </span>
                        </div>
                        <div class="form-row">
                            <div class="col-12 d-flex flex-wrap">

                                <div class="form-group col-md-6 col-sm-12">
                                    <select name="rubro_id" id="rubro_id" class="form-control" autofocus>
                                        <option value="">Rubro de negocio</option>
                                        @foreach ($empresarubros as $empresarubro)
                                        <option value="{{ $empresarubro->id }}"
                                            {{ old('rubro_id') == $empresarubro->id ? 'selected' : '' }}>
                                            {{ $empresarubro->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input type="text" name="ruc" id="ruc" size="11" maxlength="11" class="form-control"
                                        value="{{old('ruc')}}" placeholder="Ruc">
                                    <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="text" name="nombreempresa" id="nombre" class="form-control"
                                        value="{{old('nombre')}}" placeholder="Nombre o Razón Social">
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                </div>

                                <div class="form-group col-md-8 col-sm-12">
                                    <input type="text" name="direccion" id="direccion" class="form-control"
                                        value="{{old('direccion')}}" placeholder="Dirección">
                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" name="telefono" id="telefono" class="form-control"
                                        value="{{old('telefono')}}" placeholder="Teléfono" maxlength="9">
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{--Fin Cardbpdy --}}

                <div class="form-row mt-2 ">
                    <div class="col-12">
                        <span>
                            2. Datos del representante/dueño del negocio
                        </span>
                    </div>

                    <div class="col-md-12 col-sm-12  mx-auto ">
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-sm-12 col-md-4">
                                <input id="dni_representante" maxlength="8" type="text"
                                    class="form-control  @error('dni_representante') is-invalid @enderror"
                                    name="dni_representante" value="{{ old('dni_representante') }}" required
                                    autocomplete="dni_representante" placeholder="DNI">

                                @error('name_representante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-8">
                                <input id="name_representante" type="text"
                                    class="form-control  @error('name_representante') is-invalid @enderror"
                                    name="name_representante" value="{{ old('name_representante') }}" required
                                    autocomplete="name_representante" placeholder="Nombres">

                                @error('name_representante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <input type="text" name="paterno" id="paterno"
                                    class="form-control   @error('paterno') is-invalid @enderror"
                                    value="{{old('paterno')}}" placeholder="Apellido paterno" required
                                    autocomplete="paterno">

                                @error('paterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- <span class="text-danger">{{ $errors->first('paterno') }}</span>
                                --}}
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <input type="text" name="materno" id="materno"
                                    class="form-control  @error('materno') is-invalid @enderror"
                                    value="{{old('materno')}}" placeholder="Apellido materno" required
                                    autocomplete="materno">
                                {{-- <span class="text-danger">{{ $errors->first('materno') }}</span>
                                --}}
                            </div>
                            @error('materno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-row ">
                            <div class="col-12">
                                <span>
                                    3. Usuario y contraseña
                                </span>
                            </div>

                            <div class="col-12 p-2 d-flex flex-wrap" style="border-radius: 0px;">
                                <div class="form-group col-sm-12 col-sm-12 col-md-12">
                                    <input id="email" type="email" class="form-control  " name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Correo electrónico">
                                    {{-- form-control  @error('email') is-invalid @enderror --}}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <input id="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Contraseña" minlength="8">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <input id="password-confirm" type="password" class="form-control "
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirmar la contraseña">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-inline row ml-4">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"
                            id="terminosycondiciones" name="terminosycondiciones" value="">
                        <span>Acepto haber leido todos los terminos y conciciones</span> 
                            <a class="btn mp-0" data-toggle="modal" data-target="#modal_terminosycondiciones"><strong>Aqui...</strong></a>
                        <span
                            class="text-danger">{{$errors->first('terminosCondiciones')}}</span>
                    </label>

                    {{-- <input type="checkbox" name="" id="terminosycondiciones">
                    <p><i>Acepto haber leido todos los terminos y conciciones</i> 
                    <a class="btn mp-0" data-toggle="modal" data-target="#modal_terminosycondiciones"><strong>Aqui...</strong></a>
                        <span class="text-danger">{{$errors->first('terminosCondiciones')}}</span>
                    </p> --}}

                </div>

                <div class="form-row justify-content-center">
                    <div class="col-12">
                        @foreach ($errors as $error)
                        <span class="text-danger">{{ $error}}</span>
                        @endforeach
                    </div>

                    <div class="col-12 d-flex flex-row justify-content-center">



                        <div class="form-group col-6">
                            <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro" disabled>
                                <span class="spinner-border spinner-border-sm spinnerr" role="status" aria-hidden="true"
                                    style="display: none"></span>
                                Guardar
                            </button>
                        </div>
                        <div class="form-group col-6">
                            <a href="{{route('inicio.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                        </div>

                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="modal_terminosycondiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Términos y conduciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      
        </div>
        <div class="modal-body">
          @include('publico.informaciondeapp.terminosycondiciones_empresa')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="aceptarterminos" data-dismiss="modal">Aceptar</button>
          
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')


@include('publico.empresa.js')
@endsection
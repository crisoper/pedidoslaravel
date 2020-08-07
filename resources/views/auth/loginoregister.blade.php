@extends('layouts.publico.registraempresa')
@include('auth.loginCSS')
@section('contenido')
<div class="container-fluid ">
    <div class="row m-0 p-0">
        <div class="d-flex flex-wrap">

            <div id="texto" class="col-xs-12 col-sm-12 col-md-7 ">
                <div class="row mt-3">
                    <div class="titulo col-12">
                        <span class="text-danger">Tu confianza</span> es nuestra fortaleza
                    </div>
                </div>

                <div class="col-12 d-flex flex-wrap align-items-center mt-5">
                    <div class="col-4">
                        <img src="{{asset('img/logotienda.png')}}" width="100" height="80px" alt="">
                        <p>
                            PedidosApp tu tienda en linea donde encotrarás lo que estas buscando.
                        </p>
                    </div>

                    <div class="col-4">
                        <img src="https://img.icons8.com/bubbles/100/000000/hand-wash.png" />
                        <p> <span class="text-danger"> Nuestro principal objetivo</span> es tu satisfacción, cumpliendo
                            todos con los protocolos de salubridad <span class="text-danger">atenderemos de
                                forma inmediata</span> tus requerimientos.</p>
                    </div>

                    <div class="col-4">

                        <img src="https://img.icons8.com/color/96/000000/motorcycle-delivery-multiple-boxes.png" />
                        <p>
                            Todo lo que pidas te lo llevaremos hasta el lugar donde te encuentres.
                        </p>
                    </div>
                </div>


            </div>
            <div id="container_left" class="col-xs-12 col-sm-12 col-md-5 ">


                <ul id="tabs" class="nav nav-tab">
                    <li class="nav-item li_login"><a href="" data-target="#login" data-toggle="tab"
                            class="nav-link  text-dark text-uppercase @if( $flag == 'login') active  @endif "><strong>INICIA
                                SESIÓN</strong></a></li>
                    <li class="nav-item li_register">
                        <a href="" data-target="#register" data-toggle="tab"
                            class="nav-link text-dark text-uppercase  @if( $flag == 'register')active  @endif"><strong>REGISTRATE</strong></a>
                    </li>

                </ul>


                <div id="tab-content" class="tab-content">
                    <div id="login" class="pt-4 tab-pane fade @if( $flag == 'login') active show @endif"
                        style="border: none; ">
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="card-body col-12 formlario">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                {{-- ENVIAMOS SESIONSTORAGE --}}
                                                <input type="hidden" name="sesionStorage" id="sesionStorage">
                                                <i class="far fa-envelope"></i>
                                                <input id="emailLogin" type="email"
                                                    class="form-control @error('email') is-invalid @enderror  correo"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus
                                                    placeholder=' Dirección de correo electrónico'>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>

                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <i class="fas fa-unlock-alt"></i>
                                                <input id="passwordLogin" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Contraseña">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-12">
                                                <button id="btn_submitLogin" type="submit"
                                                    class="btn btn-primary btn-block btn_submit">
                                                    {{ __('Iniciar sesión') }}
                                                </button>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="register" class="tab-pane fade @if( $flag == 'register') active show @endif "
                        style="border: none;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form id="Form_RegistroComprador" method="POST"
                                        action="{{ route('loginorregister.registercomprador') }}">
                                        @csrf

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <i class="fa fa-address-card" aria-hidden="true"></i>
                                                <input id="dni" type="text" maxlength="8"
                                                    class="form-control  @error('dni') is-invalid @enderror" name="dni"
                                                    value="{{ old('dni') }}" required autocomplete="dni" autofocus
                                                    placeholder="Número de DNI">

                                                @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                {{-- <label for="name" class=" col-form-label text-md-right">{{ __('Nombre') }}</label><br>
                                                --}}
                                                <input id="nombres" type="text"
                                                    class="form-control  @error('nombres') is-invalid @enderror"
                                                    name="nombres" value="{{ old('nombres') }}" required
                                                    autocomplete="nombres" autofocus placeholder="Nombre">

                                                @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                                                --}}
                                                <input id="paterno" type="text"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    name="paterno" value="{{ old('paterno') }}" required
                                                    autocomplete="paterno" autofocus placeholder="Apellido Paterno">

                                                @error('paterno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                                                --}}
                                                <input id="materno" type="text"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    name="materno" value="{{ old('materno') }}" required
                                                    autocomplete="materno" autofocus placeholder="Apellido Materno">

                                                @error('materno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-8">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <input id="direccion" type="text"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    name="direccion" value="{{ old('direccion') }}" required
                                                    autocomplete="direccion" autofocus placeholder="Dirección">
                                                @error('direccion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <input id="telefono" type="text"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    name="telefono" value="{{ old('telefono') }}" required
                                                    autocomplete="telefono" autofocus placeholder="Teléfono"
                                                    maxlength="9">

                                                @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <i class="far fa-envelope"></i>
                                                <input id="email" type="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" placeholder="Correo electrónico">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <i class="fas fa-unlock-alt"></i>
                                                <input id="password" type="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="Contraseña">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                                                --}}
                                                <input id="password-confirm" type="password" class="form-control "
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Confirmar contraseña">
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4">
                                            {{-- <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox"
                                                    id="terminosycondiciones" name="terminosycondiciones" value="">
                                                <i>Acepto haber leido todos los terminos y conciciones <a
                                                        href="">Aqui...</a> </i>
                                                <span
                                                    class="text-danger">{{$errors->first('terminosCondiciones')}}</span>
                                            </label> --}}
                                            <p>
                                                <small><i>Acepto haber leido todos los términos y conciciones</i> </small>
                                                <a class="btn mp-0" data-toggle="modal" data-target="#modal_terminosycondiciones"><strong>Aqui...</strong></a>
                                                    <span class="text-danger">{{$errors->first('terminosCondiciones')}}</span>
                                                </p>

                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 ">

                                                <button id="btn_submit" class="btn btn-primary btn-block  btn_submit"
                                                    value="" disabled>
                                                    <span class="spinner-border spinner-border-sm spinnerr"
                                                        role="status" aria-hidden="true" style="display: none"></span>
                                                    {{ __('Registrar') }}
                                                </button>


                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
          @include('publico.informaciondeapp.terminosycondiciones_consumidor')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="aceptarterminos" data-dismiss="modal">Aceptar</button>
          
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
@include('auth.loginJS')
@endsection
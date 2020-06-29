@extends('layouts.publico.registraempresa')

<style>
    .fa-envelope, .fa-unlock-alt {
        position: absolute;
        padding: 10px;
        pointer-events: none;
    }

    #email, #password {
        padding-left: 30px !important;
    }
    .contenedor{
        margin-top: 4rem;
    }
    #tabs, #tabsContent{
        display: flex;
        justify-content: center;
        border: none;
    }
</style>
@section('contenido')
<div class="container">
    <div class="row justify-content-center contenedor" >
        <div class="col-md-8">

                <ul id="tabs" class="nav nav-tabs" >
                    <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab"
                            class="nav-link small text-uppercase " style="border: none;">INICIA SESIÓN</a></li>
                    <li class="nav-item">
                        <a href="" data-target="#profile1" data-toggle="tab"
                            class="nav-link small text-uppercase active " style="border: none;">REGISTRATE</a>
                    </li>

                </ul>
              
                <div id="tabsContent" class="tab-content ">
                    <div id="home1" class="tab-pane fade" style="border: none;">
                        
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    {{-- <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
                                    </label> --}}

                                    <div class="col-md-12">
                                            <i class="far fa-envelope"></i>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror  correo"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder=' Dirección de correo electrónico'>
                                     

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {{-- <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                    <div class="col-md-12">
                                        <i class="fas fa-unlock-alt"></i>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Contraseña">

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
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Login') }}
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
                    <div id="profile1" class="tab-pane fade active show" style="border: none;">
                        <div class="row ">
                            {{-- <div class="col-md-4"><img src="//dummyimage.com/1005x559.png/5fa2dd/ffffff"
                                    class="float-right img-fluid img-rounded">
                            </div> --}}

                            <div class="col-md-12">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                {{-- <label for="dni" class=" col-form-label text-md-right">{{ __('Número de DNI') }}</label><br>
                                                --}}
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
                                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                                                --}}
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
                                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                                                --}}
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
                                                {{-- <label for="email" class=" col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                                                --}}
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
                                                {{-- <label for="password" class=" col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                                --}}
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

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    style="background-color: rgb(245, 170, 8)">
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
@endsection
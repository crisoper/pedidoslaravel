@extends('layouts.publico.registraempresa')

<style>
    .fa-envelope,
    .fa-unlock-alt,
    .fa-map-marker,
    .fa-phone,
    .fa-address-card {
        position: absolute;
        padding: 10px;
        pointer-events: none;
        color: #f72a2a;
    }
   
    #email,
    #password,
    #direccion,
     #telefono,
     #dni{
        padding-left: 30px !important;
       
    }

    .contenedor {
        margin-top: 4rem;
    }

    #tabs,
    #tabsContent {
        
        justify-content: center;
        border: none;
        
        
    }
  .nav-link{
    font-size: 16px !important;
    border: none !important;
    background-color: transparent !important;
     }
     #btn_submit{
        background-color: #f72a2a !important; 
        border-radius:0px !important; 
        border: 0px;
     }
     #btn_submit:hover{
        background-color: #d41f1f !important; 
        box-shadow: 0.5px 0.5px 1px 1.5px #e63719 ;
     }
     .container_left {
        background-color: #F8F9FA;
        height: 100vh;
    }
</style>
@section('contenido')
<div class="container container_left ">
    <div class="row justify-content-center pt-5 ">
        <div class="col-md-8 mt-4">

            <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item li_login"><a href="" data-target="#login" data-toggle="tab"
                        class="nav-link small text-uppercase @if( $flag == 'login') active  @endif"
                       >INICIA SESIÓN</a></li>
                <li class="nav-item li_register">
                    <a href="" data-target="#register" data-toggle="tab"
                        class="nav-link small text-uppercase  @if( $flag == 'register')active  @endif "
                       >REGISTRATE</a>
                </li>

            </ul>

            <div id="" class="tab-content col-12 mt-2">
                <div id="login" class="pt-5 tab-pane fade @if( $flag == 'login') active show @endif" style="border: none; ">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card-body col-12">
                                <form method="POST" action="{{ route('login') }}" >
                                    @csrf
                                    <div class="form-group row">                                   
                                        <div class="col-12">
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
                                        <div class="col-12">
                                            <i class="fas fa-unlock-alt"></i>
                                            <input id="password" type="password"
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
                                            <button id="btn_submit" type="submit" class="btn btn-danger btn-block " >
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
                                <form method="POST" action="{{ route('register') }}">
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
                                                class="form-control  @error('name') is-invalid @enderror" name="paterno"
                                                value="{{ old('paterno') }}" required autocomplete="paterno" autofocus
                                                placeholder="Apellido Paterno">

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
                                                class="form-control  @error('name') is-invalid @enderror" name="materno"
                                                value="{{ old('materno') }}" required autocomplete="materno" autofocus
                                                placeholder="Apellido Materno">

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
                                                autocomplete="telefono" autofocus placeholder="Teléfono" maxlength="9">

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
                                                class="form-control  @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Correo electrónico">

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
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="terminosycondiciones" name="terminosycondiciones" value=""> <i>Acepto haber leido todos los terminos y conciciones <a href="#">Aqui...</a>    </i>
                                            <span class="text-danger">{{$errors->first('terminosCondiciones')}}</span>
                                          </label>
                                         
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 ">
                                            <input id="btn_submit" type="submit" class="btn btn-primary btn-block  " value="{{ __('Registrar') }}" disabled>
                                                
                                          
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

@section('scripts')
<script>

    $(document).ready(function(){
   
        if ( $("#login").hasClass('active') ) {
            $(".li_login").attr('style','border-bottom:3px solid red !important; color: red !important;');
        }
       
        if ( $("#register").hasClass('active') ) {
            $(".li_register").attr('style','border-bottom:3px solid red !important; color: red !important;');
        }
       
        $(".li_login").on('click', function(){
            $(".li_login").attr('style','border-bottom:3px solid red !important; color: red !important; font: bold !important;');
            $(".li_register").removeAttr('style');
        });
        
        $(".li_register").on('click', function(){
            $(".li_register").attr('style','border-bottom:3px solid red !important; color: red !important; font: bold !important;');
            $(".li_login").removeAttr('style');         

        })
      
  
        $('#terminosycondiciones').on('change', function() {
             if( $(this).prop('checked') ) {
                
               
                $("input[type=submit]").removeAttr("disabled");
             }  else{
                $("input[type=submit]").attr('disabled','disabled');
             }
        });
        
               
    });
</script>
    
@endsection
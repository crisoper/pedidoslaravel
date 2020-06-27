@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                {{-- <label for="dni" class=" col-form-label text-md-right">{{ __('Número de DNI') }}</label><br> --}}
                                <input id="dni" type="text" maxlength="8" class="form-control form-control-sm @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus placeholder="Número de DNI">

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                {{-- <label for="name" class=" col-form-label text-md-right">{{ __('Nombre') }}</label><br> --}}
                                <input id="nombres" type="text" class="form-control form-control-sm @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus placeholder="Nombre">

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Paterno') }}</label> --}}
                                <input id="paterno" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="paterno" value="{{ old('paterno') }}" required autocomplete="paterno" autofocus placeholder="Apellido Paterno">

                                @error('paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Materno') }}</label> --}}
                                <input id="materno" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="materno" value="{{ old('materno') }}" required autocomplete="materno" autofocus placeholder="Apellido Materno">

                                @error('materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8">
                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Paterno') }}</label> --}}
                                <input id="direccion" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus placeholder="Dirección">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                {{-- <label for="" class=" col-form-label text-md-right">{{ __('Apellido Materno') }}</label> --}}
                                <input id="telefono" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="Teléfono" maxlength="9">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                {{-- <label for="email" class=" col-form-label text-md-right">{{ __('Correo electrónico') }}</label> --}}
                                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                {{-- <label for="password" class=" col-form-label text-md-right">{{ __('Contraseña') }}</label> --}}
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            
                            <div class="col-md-6">
                                {{-- <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label> --}}
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                        <h1>ubicación</h1>
                        <div id="mapa" style="width: 700px; height: 500px;">
                            {{-- AIzaSyC7USZB-cMhAHBkAxLc4RVfDtINg_1O5lc --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
            var divMapa = $("#mapa");
            navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
            function fn_mal(){}
            function fn_ok(){
                var lat= rta.coords.latitude;
                var lon = rta.coords.longitude;
                var gLanLong = new google.maps.LatLng( lat, lon);
                var objConfig = {
                    zoom:17,
                    center: gLanLong
                }
                var gMap = new google.maps.Map( divMapa, objConfig )
            }
            


    });
</script>

@endsection
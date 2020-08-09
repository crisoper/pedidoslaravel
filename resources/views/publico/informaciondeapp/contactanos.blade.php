@extends('layouts.public')

@section('contenido')
@include('auth.loginCSS')

<div class="container">
    <div class="row">
        <div class="col-12 section_title p-0 mb-4">
            <h2 class="my-1">Contáctanos</h2>
        </div>
    </div>
</div>

<div class="container">

    <div class="form-row " style="background: white;">

        <div class="col-md-6">
            <div class="card-body">
                <form method="post" action="{{ route('contactatecreate') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group ">

                                <input id="asunto" type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="asunto" value="{{ old('asunto') }}" required autocomplete="asunto" autofocus
                                    placeholder="Asunto">
                                @error('asunto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <input id="nombre" type="text" 
                                    class="form-control  @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                                    placeholder="Nombre y apellido">
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group ">
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
                        <div class="col-md-4">
                            <div class="form-group ">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input id="telefono" type="text"
                                    class="form-control  @error('name') is-invalid @enderror" name="telefono"
                                    value="{{ old('telefono') }}" required autocomplete="telefono" autofocus
                                    placeholder="Teléfono" maxlength="9">

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <textarea name="mensaje" rows="4" cols="30"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    value="{{ old('mensaje') }}" required ></textarea>

                                @error('mensaje')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       

                        <div class="col-md-12 ">
                            <div class="form-group ">

                                <button type="submit" class="btn btn-danger btn-block" value="">
                                  
                                   ENVIAR
                                </button>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/diversos/contactate.jpg')}}" alt="Contáctanos">
        </div>
    </div>
</div>


@endsection
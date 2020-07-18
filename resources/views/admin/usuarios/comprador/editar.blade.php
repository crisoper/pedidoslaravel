@extends('layouts.publico.registraempresa')

@section('contenido')
<style>
    .contenido{
        background-color: white;
        padding: 3em;
    }
    .nav-link:hover{
        background: rgb(231, 231, 231);
        border: none !important;
        color: rgb(0, 0, 0) !important;
    }
    .menu{
        background-color: rgb(240, 240, 240);
        padding-top: 3em;
    }
</style>
<div class="container ">

    <div class="row">
        <div class="col-12 mt-5">
            <div class="row pt-5">
                <div class="col-3 menu">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Mi cuenta</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Editar información</a>
                    {{-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cambiar contraseña</a> --}}
                    
                  </div>
                </div>
                <div class="col-9 contenido">
                  <div class="tab-content" id="v-pills-tabContent">
{{-- MI CUENTA --}}
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form action="{{ route("usuarios.cambiarmiclave") }}" method="POST">
                            <div class="form-row pb-4">
                                <div class="col text-center">
                                    <img width="100px" height="100px" 
                                        @if ( auth()->user()->avatar != null && Storage::disk('usuarios')->exists('usuarios/').auth()->user()->avatar )
                                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/').auth()->user()->avatar ) }}" 
                                        @else 
                                        src="{{ asset( Storage::disk('usuarios')->url('usuarios/default.png') )  }}" 
                                        @endif
                                    alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">
                                    <br>
                                    <a href="#" id="openImageDialog"><i class="fas fa-camera text-dark"></i></a>
                                    <input id="file-input" type="file" name="name" style="display: none;" />
                                </div>
                            </div>
                
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Nombre</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {{ auth()->user()->name }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Correo</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {{ auth()->user()->email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Dirección</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {{ auth()->user()->persona->direccion }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Dni</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {{ auth()->user()->persona->dni }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Teléfono</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {{ auth()->user()->persona->telefono }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Roles de permisos</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            @foreach (auth()->user()->roles()->where('guard_name', '=', 'web')->pluck('name') as $rol )
                                                {{ $rol }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12 col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            <strong>Roles para menus</strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            @foreach (auth()->user()->roles()->where('guard_name', '=', 'menu')->pluck('name') as $rol )
                                                {{ $rol }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                                         
                
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <a class="text-danger pl-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesion') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
{{-- EDITAR INFORMACION --}}
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form action="{{ route('usuarios.update', Auth()->user()->id) }}" method="POST">
                            @csrf
                            {!! method_field('PUT') !!}
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="hidden" name="personaid" value="{{ Auth()->user()->persona->id }}">
                                    <input autofocus type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ Auth()->user()->persona->nombre }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="paterno">Apellido Paterno</label>
                                    <input autofocus type="text" name="paterno" id="paterno" placeholder="Paterno" value="{{ Auth()->user()->persona->paterno }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('paterno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="materno">Apellido Materno</label>
                                    <input autofocus type="text" name="materno" id="materno" placeholder="Materno" value="{{ Auth()->user()->persona->materno }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('materno') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="dni">Num. DNI</label>
                                    <input autofocus type="text" maxlength="8" name="dni" id="dni" placeholder="DNI" value="{{ Auth()->user()->persona->dni }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-3">
                                    <label for="telefono">Teléfono</label>
                                    <input autofocus type="text" maxlength="9" name="telefono" id="telefono" placeholder="Teléfono" value="{{ Auth()->user()->persona->telefono }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="direccion">Dirección</label>
                                    <input autofocus type="text" name="direccion" id="direccion" placeholder="Dirección" value="{{ Auth()->user()->persona->direccion }}" class="form-control">
                                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                </div>                             
                                  <label for="">Usuario y contraseña:</label>
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="name">Correo</label>
                                    <input type="text" value="{{ Auth()->user()->email }}" class="form-control" disabled>
                                    {{-- INPUT QUE ENVIA LA INFORMACION DESACTIVADO --}}
                                    <input type="text" name="email" id="email" placeholder="correo" value="{{ Auth()->user()->email }}" class="form-control" style="display:none">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="password">Contraseña</label>
                                    <input class="form-control" type="password" name="password" value="">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="password_confirmation">Confirmar contraseña</label>
                                    <input class="form-control" type="password" name="password_confirmation" value="">
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            </div>
            
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
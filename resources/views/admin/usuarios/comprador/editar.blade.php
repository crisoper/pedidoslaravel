@extends('layouts.app')

@section('content')
<style>
    .tab-content{
        background-color: white;
        padding: 2em;
    }
</style>
<div class="container">

    <div class="row">
        <div class="col-sm-10 col-md-8 mx-auto">
            <div class="row text-center">
               <div class="col-12">
                <h3>Configuración de cuenta</h3>
               </div>
            </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mi cuenta</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Actualizar información</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar mi contraseña</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    {{-- <form action="{{ route("usuarios.cambiarmiclave") }}" method="POST"> --}}
                        <div class="form-row pb-4">
                            <div class="col text-center" id="imgavatar">
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
                       
                        {{-- @csrf --}}
                       
            
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
                            <a href="{{ route('inicio.index') }}"><i class="fa fa-home" aria-hidden="true"></i> Ir a inicio</a>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12">
                                <a class="text-danger pl-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesion') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    {{-- <form action="{{ route('loginOrRegister.update.comprador')}}" method="POST"> --}}
                    <form action="{{ route('actualizar.datos.administrador')}}" method="POST">
                        @csrf
                        {!! method_field('PUT') !!}
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" name="personaid" value="{{ $persona->id }}">
                                <input autofocus type="text" name="nombre" id="nombre" placeholder="Nombre"
                                    value="{{ $persona->nombre }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="paterno">Apellido Paterno</label>
                                <input autofocus type="text" name="paterno" id="paterno" placeholder="Paterno"
                                    value="{{ $persona->paterno }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('paterno') }}</span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="materno">Apellido Materno</label>
                                <input autofocus type="text" name="materno" id="materno" placeholder="Materno"
                                    value="{{ $persona->materno }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('materno') }}</span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-3">
                                <label for="dni">Num. DNI</label>
                                <input autofocus type="text" maxlength="8" name="dni" id="dni" placeholder="DNI"
                                    value="{{ $persona->dni }}" class="form-control">
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-3">
                                <label for="telefono">Teléfono</label>
                                <input autofocus type="text" maxlength="9" name="telefono" id="telefono"
                                    placeholder="Teléfono" value="{{ $persona->telefono }}"
                                    class="form-control">
                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="direccion">Dirección</label>
                                <input autofocus type="text" name="direccion" id="direccion"
                                    placeholder="Dirección" value="{{ $persona->direccion }}"
                                    class="form-control">
                                <span class="text-danger">{{ $errors->first('direccion') }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                {{-- <a href="{{ route('loginOrRegister.editar.comprador') }}"
                                    class="btn btn-danger">Cancelar</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="col-8">
                        {{-- <form action="{{ route('loginOrRegister.cambiarcontraseñaComprador')}}" method="POST"> --}}
                        <form action="{{ route('usuarios.cambiarmiclave')}}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            {{-- {!! method_field('PUT') !!} --}}
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="nameuser">Usuario</label>
                                <input class="form-control" type="nameuser" name="nameuser" value="{{ Auth()->user()->email }}" readonly>
                                    <span class="text-danger">{{ $errors->first('nameuser') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="password">Nueva Contraseña</label>
                                    <input class="form-control" type="password" name="password" value="">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group col-xs-12 col-sm-12">
                                    <label for="password_confirmation">Confirmar contraseña</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        value="">
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>                                    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                   
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
{{--                                    
                                    <a href=''
                                        class="btn btn-danger btn-block" > Cancelar</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>

        </div>
    </div>
</div>
  
@endsection


@section('scripts')

    <script>
        (function($) {
                      
          
            if ( $("#cambiarMiClave").is(':checked') )
            {
             
                $(".toggleChangePassword").css("display", "block");
            }
            else
            {
                $(".toggleChangePassword").css("display", "none");
            }

            $("#cambiarMiClave").on("change", function() {
                $(".toggleChangePassword").css("display", "block");
                
                if ( $("#cambiarMiClave").is(':checked') )
                {
                    $(".toggleChangePassword").css("display", "block");
                }
                else
                {
                    $(".toggleChangePassword").css("display", "none");
                }
            });



            $('#openImageDialog').on('click', function() {
                $('#file-input').trigger('click');
            });

            $("#file-input").on("change", function() {

                var formData = new FormData();
                var files = $('#file-input')[0].files[0];
                formData.append('foto',files);

                $.ajax({
                    method: "POST",
                    url: "{{ route('ajax.miperfilsubirfoto') }}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,                    
                    success:function( data ){
                      console.log( data );
                        
                        $('.logoPerfilForm').html(' <img width="100px" height="100px" src="{{ asset( Storage::disk("usuarios")->url("usuarios/'+data.imagen+'") )  }}"  alt="{{ auth()->user()->name }}" class="rounded-circle logoPerfilForm">');
                        // $('.logoPerfilForm').attr('src', 'data:image/png;base64,'+ data.imagen );
                        MostrarNotificaciones( "Operacion realizada con exito", 'success' );
                        // console.log(data);
                    },
                    error: function( jqXHR, textStatus, errorThrown ) {
                        if( jqXHR.status == 404 ) 
                        {
                            // console.log(jqXHR);
                            MostrarNotificaciones( "Pagina no encontrada, contacte al administrador del sistema", 'error' );
                        }
                        else if( jqXHR.status == 422) {
                            $.each( jqXHR.responseJSON.errors.foto, function( key, value ) {
                                MostrarNotificaciones( value, 'error' );
                            });

                        }
                        else if( jqXHR.status == 500 ) {
                            // console.log(jqXHR);
                            MostrarNotificaciones( "Se ha producido un error, contacte al administrador del sistema", 'error' );
                        }
                        else if( jqXHR.status == 403 ) {
                            // console.log(jqXHR);
                            MostrarNotificaciones( "Usted no tiene permiso para realizar esta accion, contacte al administrador del sistema", 'error' );
                        }
                    }
                });

            });


        })(jQuery); 
  
    </script>

@endsection
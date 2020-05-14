@extends('layouts.adminlte3.adminlte3')


@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-sm-10 col-md-7 mx-auto">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3>Mi cuenta</h3>
                </div>
                <div class="card-body">
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
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="cambiarMiClave" id="cambiarMiClave" value="1" {{ old('cambiarMiClave') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="cambiarMiClave">Cambiar mi clave</label>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 toggleChangePassword" style="display: none">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" name="password" value="">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            
                            <div class="form-group col-xs-12 col-sm-6 toggleChangePassword" style="display: none">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input class="form-control" type="password" name="password_confirmation" value="">
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
            
                        <div class="form-row toggleChangePassword">
                            <div class="form-group col-xs-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Cambiar mi clave</button>
                                {{-- <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a> --}}
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
            </div>
        </div>
    </div>
</div>
  
@endsection


@section('scriptspersonalizados')

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
                        // $('#logoPerfilForm').html('<img src="data:image/png;base64,' + data.imagen  + '" />');
                        $('.logoPerfilForm').attr('src', 'data:image/png;base64,' + data.imagen);
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
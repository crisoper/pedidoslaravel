@extends('layouts.publico.registraempresa')

@section('contenido')
<style>
    input {
        border-radius: 0em;

    }
    .img{
  margin:10px auto;
  border-radius:5px;
  border: 1px solid #999;
  padding:1px;
  width:220px;
  height:200px;
  background-size: 100% 100%;
  background-repeat:no-repeat;
  background:url(../img/imagen.jpg);
  background-size: cover;
  }
.img img{
  width: 100%;
}
@media all and (min-width: 500px) and (max-width: 1000px)
{  
.img{
  margin:20px auto;
  border-radius:5px;
  border: 1px solid #999;
  padding:1px;
  width:300px;
  height:280px;
  background-size: 100% 100%;
  background-repeat:no-repeat;
  background:url(../img/imagen.jpg);
  background-size: cover;
  
  }
}
.img img{
   width:100%;
}
</style>
<div class="container">
    <div class="row">
        <div class="col">

            <div class="col-12" style="background-color: #F5F5F5">

                <form id="formularioRegistroEmpresa" action="{{route('registratuempresa.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">
                            <span class="display-3 ">Bienvenido</span>
                            <p>

                            </p>
                        </div>

                        <div class="col-md-8 col-sm-12  mx-auto ">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <span>Datos de la Empresa</span>
                                </div>

                                <div class="card-body">
                                    <div class="form-row">
                                                                        
                                                <div class="col-md-8 col-sm-12 ">
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <select name="rubro_id" id="rubro_id"
                                                            class="form-control form-control-sm btn-block " autofocus>
                                                            <option value="">Rubro de negocio</option>
                                                            @foreach ($empresarubros as $empresarubro)
                                                            <option value="{{ $empresarubro->id }}"
                                                                {{ old('rubro_id') == $empresarubro->id ? 'selected' : '' }}>
                                                                {{ $empresarubro->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{ $errors->first('rubro_id') }}</span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="ruc" id="ruc" size="11" maxlength="11"
                                                            class="form-control form-control-sm" value="{{old('ruc')}}"
                                                            placeholder="Ruc" >
                                                        <span class="text-danger">{{ $errors->first('ruc') }}</span>
                                                    </div>

                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="nombre" id="nombre"
                                                            class="form-control form-control-sm"
                                                            value="{{old('nombre')}}"
                                                            placeholder="Nombre o Razón Social">
                                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="nombrecomercial" id="nombrecomercial"
                                                            class="form-control form-control-sm"
                                                            value="{{old('nombrecomercial')}}"
                                                            placeholder="Nombre Comercial">
                                                        <span
                                                            class="text-danger">{{ $errors->first('nombrecomercial') }}</span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="text" name="direccion" id="direccion"
                                                            class="form-control form-control-sm"
                                                            value="{{old('direccion')}}" placeholder="Dirección">
                                                        <span
                                                            class="text-danger">{{ $errors->first('direccion') }}</span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12">
                                                        <input type="url" name="facebook" id="facebook"
                                                            class="form-control form-control-sm"
                                                            value="{{old('facebook')}}"
                                                            placeholder="Página de facebook">
                                                        <span
                                                            class="text-danger">{{ $errors->first('facebook') }}</span>
                                                    </div>


                                                </div>
                                                <div class="col-md-4 col-sm-12 text-center">
                                                    
                                                            <div id="imagePreview" class="img" >
                                                            <img src="{{asset('img/logodefault.png')}}" alt="" >
                                                            </div>
                                                            <div class="bg-danger pt-1 pb-1"  id="errorextension" style="display: none; line-height : 10px;">

                                                                <p style="line-height : 12px;" > <small> <strong>¡Error!</strong> <br> Solo se permiten archivos con extensión .jpeg/.jpg/.png</small></p>
                                                            </div>
                                                            
                                                            <span id="camara"><h4><i class="fas fa-camera"></i></h4></span>
                                                            <input type="file" id="file" name="logo" id="logo" style="display: none">


                                                            <span
                                                                class="text-danger">{{ $errors->first('logo') }}
                                                            </span>                                                      
                                                </div>                                        
                                                                              
                                    </div>
                                    <div class="form-row">                                        
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="departamentoid" id="departamento"
                                                    class="form-control form-control-sm " autofocus>
                                                    <option value="">Departamento</option>
                                                    @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}"
                                                        {{ old('departamentoid') == $departamento->id ? 'selected' : '' }}>
                                                        {{ $departamento->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('departamentoid') }}</span>
                                                <input type="hidden" id="obligatorio" class="text-danger" value="{{ $departamento->nombre }}">
                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="procinciaid" id="provincia"
                                                    class="form-control form-control-sm " autofocus>
                                                    <option value="">Provincia</option>
                                                    @foreach ($provincias as $provincia)
                                                    <option value="{{ $provincia->id }}"
                                                        {{ old('procinciaid') == $provincia->id ? 'selected' : '' }}>
                                                        {{ $provincia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('procinciaid') }}</span>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-12">
                                                <select name="distritoid" id="distrito"
                                                    class="form-control form-control-sm " autofocus>
                                                    <option value="">Distrito</option>
                                                    @foreach ($distritos as $distrito)
                                                    <option value="{{ $distrito->id }}"
                                                        {{ old('distritoid') == $distrito->id ? 'selected' : '' }}>
                                                        {{ $distrito->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('distritoid') }}</span>
                                            </div>
                                       
                                    </div>
                                </div>{{--Fin Cardbpdy --}}
                            </div>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">
                        </div>
                        <div class="col-md-8 col-sm-12  mx-auto ">
                            <div class="card card-outline card-primary col-12 ">
                                <div class="card-header">
                                    <span>Datos del Representante</span>
                                </div>
                                <div class="card-body">

                                    <div class="d-flex flex-wrap">
                                        <div class="form-group col-sm-12 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="Nombres">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            {{-- <span class="text-danger">{{ $errors->first('nombre') }}</span> --}}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <input type="text" name="paterno" id="paterno"
                                                class="form-control form-control-sm  @error('paterno') is-invalid @enderror"
                                                value="{{old('paterno')}}" placeholder="Apellido paterno" required
                                                autocomplete="paterno">

                                            @error('paterno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            {{-- <span class="text-danger">{{ $errors->first('paterno') }}</span> --}}
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4">
                                            <input type="text" name="materno" id="materno"
                                                class="form-control form-control-sm @error('materno') is-invalid @enderror"
                                                value="{{old('materno')}}" placeholder="Apellido materno" required
                                                autocomplete="materno">
                                            {{-- <span class="text-danger">{{ $errors->first('materno') }}</span> --}}
                                        </div>
                                        @error('materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-wrap">
                                        <div class="form-group col-sm-12 col-md-4">
                                            <input type="text" name="dni" id="dni" class="form-control form-control-sm"
                                                value="{{old('dni')}}" placeholder="DNI" maxlength="8">
                                            <span class="text-danger">{{ $errors->first('dni') }}</span>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4">
                                            <input type="text" name="telefono" id="telefono"
                                                class="form-control form-control-sm" value="{{old('telefono')}}"
                                                placeholder="Teléfono" minlength="9" maxlength="9">
                                            <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12 col-md-12">
                                            <input id="email" type="email"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Dirección de correo electrónico">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <input id="password" type="password"
                                                class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Contraseña" minlength="8">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-sm" name="password_confirmation"
                                                required autocomplete="new-password"
                                                placeholder="Confirmar la contraseña">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mx-auto d-flex justify-content-center align-items-center">

                        </div>
                        <div class="col-md-8 col-sm-12  mx-auto">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <input type="hidden" name="" id="changeicon" value="0">
                                    <a class="btn" data-toggle="collapse" href="#verhorario" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-angle-double-down" id="icono"></i> Horario de atención
                                    </a>
                                </div>

                                <div class="collapse" id="verhorario">
                                    <div class="card-body pt-0">
                                        @foreach ($dias as $dia)
                                        <div class="form-row">
                                            <div class="form-group col-sm-4 col-md-6">
                                                <div class="ml-5 d-flex align-items-center">
                                                    <label class="form-check-label" for="dias{{ $dia }}">
                                                        <input class="form-check-input" type="checkbox" name="dias[{{ $loop->iteration }}]"
                                                            id="dias{{ $dia }}" value="{{ $dia }}">{{ $dia }}
                                                    </label>
                                                </div>


                                            </div>
                                            <div class="form-group col-sm-4 col-md-3">
                                                <small class="text-muted">Desde:</small>
                                                <div class="input-group date horainicio" id="timepicker"
                                                    data-target-input="nearest">
                                                    <input type="text" name="horainicio[{{ $loop->iteration }}]" id="horainicio{{ $dia }}"
                                                        class="form-control form-control-sm datetimepicker-input"
                                                        data-target="#hora" />
                                                    <div class="input-group-append" data-target="#hora"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4 col-md-3">
                                                <small class="text-muted">Hasta:</small>
                                                <div class="input-group date horafin" id="timepicker"
                                                    data-target-input="nearest">
                                                    <input type="text" name="horafin[{{ $loop->iteration }}]" id="horafin{{ $dia }}"
                                                        class="form-control form-control-sm datetimepicker-input"
                                                        data-target="#hora" />
                                                    <div class="input-group-append" data-target="#hora"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="form-row text-center">
                                <div class="form-group col-4 d-flex flex-nowrap">
                                </div>
                                <div class="form-group col-8 d-flex flex-nowrap">
                                    @csrf
                                
                                    <div class="form-group col-6">
                                        <button type="button" class="btn btn-primary btn-block" id="enviarFormRegistro">Guardar</button>
                                    </div>
                                    <div class="form-group col-6">
                                        <a href="{{route('empresas.index')}}" class="btn btn-danger btn-block">Cancelar</a>
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

@endsection

@section('scripts')
<script>

    
$(document).ready(function(){
        setTimeout( function() {
            $("#errorextension").fadeOut(1000);
        }, 5000);
       
      $("#camara").on("click", function(){
        $("#file").trigger('click');
        $("#errorextension").fadeOut();
      })

   $("#file").on('change', function(event){
   
    event.preventDefault();
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        $("#errorextension").show();
      
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

   });

        function fileValidation(){
  
}

    $('#departamento').select2({
            placeholder: "Departamento"
    });
    $('#provincia').select2({
            placeholder: "Provincia"
    });
    $('#distrito').select2({
            placeholder: "Distrito"
    });
    $('#rubro_id').select2({
            placeholder: "Rubro"
    });

    $('#departamento').on("change", function () {

    let elemento = this;

    $.ajax({
        url: "{{ route('ajax.getprovinciaByDepartamentoId') }}",
        method:'GET',
        dataType:'json',
        data: {
            departamento_id : $( elemento ).val()
        },
        success: function( resp ){
            //console.log( resp );
            $("#provincia").html(""); 

            $.each( resp.data, function( key, value ) {

                let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                $("#provincia").append( opcion ); 
            });

            $('#provincia').trigger("change");

        },
        error:  function( jqXHR, textStatus, errorThrown ) {
            $("#provincia").html(""); 
            console.log( jqXHR );
        }

    });

    });
        
        
    
    $('#provincia').on("change", function () {
    
    let elemento = this;
    
    $.ajax({
        url: "{{ route('ajax.getdistritosByProvinciaId') }}",
        method:'GET',
        dataType:'json',
        data: {
            provincia_id : $( elemento ).val()
        },
        success: function( resp ){
        
            $("#distrito").html(""); 
            $.each( resp.data, function( key, value ) {
                let opcion = `<option value="${ value.id }">${ value.nombre }<option>`;
                $("#distrito").append( opcion ); 
            });
            
        },
        error:  function( jqXHR, textStatus, errorThrown ) {
            $("#distrito").html(""); 
            console.log( jqXHR );
        }
    
    });
    
    });
    
    
    $("#enviarFormRegistro").on('click', function(event){
        event.preventDefault();
        $.ajax({
            url: $("#formularioRegistroEmpresa").attr('action'),
            method: 'post',
            dataType: 'json',
            data: $("#formularioRegistroEmpresa").serialize(),
            success: function( data ){
                datoguardadocorrectamente();
            },
            error:function( jqXHR, textStatus, errorThrown  ){
                if( jqXHR.status == 404 ) {}
                
                else if( jqXHR.status == 422 ) 
                {                        
                    GLOBARL_settearErroresEnCampos( jqXHR, "formularioRegistroEmpresa" );
                }
                else if( jqXHR.status == 429 ) 
                {                        
                    console.log( jqXHR );
                }
            }
        });
    });
    function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

    //Mostramos errores devueltos desde Backend
    let errorsRespuesta = jqXHR.responseJSON.errors;

    $.each( errorsRespuesta, function( idElemento, arrayErrores ) {

        $( "#" + idElemento ).addClass("is-invalid");
            arrayErrores.forEach( error => {
            MostrarNotificaciones( $("#obligatorio").val() ,  'error') ;
           
        });

    });

    //Ocultamos los errores despues de 5 segundos
    setTimeout( function() {
    
        $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
    }, 5000);

    }
    function datoguardadocorrectamente() {
   
   bootbox.alert({
            message: "La respuesta se ha registrado correctamente!",
            callback: function () {
                // window.location = $("#preguntasiguiente").val();
            }
        });
   
    }
                
});
</script>

@endsection
@extends('layouts.publico.registraempresa')

@section('contenido')

<div class="container" style="margin-top: 1em;">
    <div class="row ">
        <div class="col ">
            <div class="card">
                <div class="card-header bg-info text-center mb-0 pb-0">
                    <img src="{{asset('img/email.png')}}" alt="">
                </div>
               
                <div class="card-body text-center ">
                
                    <span class="display-4">¡Excelente! ya casi terminas...</span>
                    <p class="card-text">
                        <h3>Accede a tu correo electrónico para validar tu cuenta.</h3>
                        <small>Si aun no pude ver el mensaje enviado revise en <strong>correos no deseados</strong>, de lo contrario vuelva a enviar un nuevo mensaje.</small>
                    </p>
                   
                    <button type="button" class="btn text-primary" name="mostraremail" id="mostraremail">Enviar un nuevo correo electrónico.</button>
                        <div  class=' 
                        @if ( $errors->has("email"))
                            "alert alert-danger"    
                        @endif'
                        role="alert"
                        >
                            <span id="error" class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                    <div class="row pt-5 d-flex justify-content-center">
                        <div class="col-md-6 col-sm-12" id="cambiarcorreoUsuario" style="display: none;">
                            <form action="{{ route('cambiaremailusuario.update', Session::get('userid',0) )  }}" method="POST">
                           
                                <span><small>Si no esta segur@ del correo que ingresó en el fomulario principal puede modificarlo aquí </small></span>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Ingrese correo electrónico">
                                        
                                    <span class="input-group-append">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                    </span>
                                </div>
                                <span><small>Enviaremos un mensaje al  correo electrónico que está registrado para validar tu cuenta. </small></span>
                            </form>
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
        $("#mostraremail").on('click',function(event){
            event.preventDefault();
            if ($(this).html() === "Si estoy segur@ del correo que registré."){
                $("#cambiarcorreoUsuario").hide();
                $(this).html("Cambiar mi dirección de correo electrónico.");
             
            }
            else{
                $(this).html("Si estoy segur@ del correo que registré.");
                $("#cambiarcorreoUsuario").show();
            }
            setTimeout( function() {
                    $("#error").fadeOut();
            }, 2000);
            
          
        });
    });
</script>
@endsection
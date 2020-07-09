@extends('layouts.publico.registraempresa')

@section('contenido')

<div class="container" style="margin-top: 5rem;">
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
                    </p>
{{-- BOTON PARA CAMBIAR CORREO ELECTRONICO --}}
                    {{-- <button type="button" class="btn text-primary" name="mostraremail" id="mostraremail">Cambiar mi
                        dirección de correo electrónico.</button> --}}
                        <div  class=' 
                        @if ( $errors->has("email"))
                            "alert alert-danger"    
                        @endif'
                        role="alert"
                        >
                            <span id="error" class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        @php
                       
                       $userid = Auth()->user()->id; 
                    @endphp

                    <div class="row pt-5 d-flex justify-content-center">
                        <div class="col-md-6 col-sm-12" id="cambiarcorreoUsuario" style="display: none;">
                            <form action="{{ route('cambiaremailusuario.update',$userid)  }}" method="POST">
                             
                                <span><small>Si no estas segur@ del correo que ingresaste en el fomulario principal puedes modificarlo aquí </small></span>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Ingrese correo electrónico">
                                        
                                    <span class="input-group-append">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                    </span>
                                </div>
                                <span><small>Enviaremos un mensaje al  correo electrónico que estas registrado para valizadar tu cuenta. </small></span>
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
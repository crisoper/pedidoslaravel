@extends('layouts.publico.registraempresa')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col ">
            <div class="card">
                <div class="card-header bg-info text-center mb-0 pb-0">
                <img src="{{asset('img/email.png')}}" alt="">
                </div>
                <div class="card-body text-center ">
                    <span class="display-4">¡Excelente! ya casi terminas...</span>
                    <p class="card-text"><h3>Accede a tu correo electrónico para validar tu cuenta.</h3> </p>
                    <button type="button" class="btn text-primary" name="mostraremail" id="mostraremail" >Cambiar mi dirección de correo electrónico</button>
                   
                    <div class="row pt-5 d-flex justify-content-center" >
                        <div class="col-md-6 col-sm-12"  id="corregiremail" style="display: none;" >
                        <form action="{{ route('cambiaremail', $user)  }}" method="post">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese correo electrónico">
                                    <span class="input-group-append">
                                    <button type="submit" class="btn btn-info">Enviar</button>
                                </span>
                                </div>
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
        // $("#mostraremail").on('click',function(event){
        //     event.preventDefault();
            
        //     $(this).show();
        //     $("#corregiremail").show();
        // });
    });
</script>
@endsection
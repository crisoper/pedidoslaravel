
@extends('layouts.admin.admin')

@section('contenido')
 
<div class="col-12">
        <header class="text-center">
           <h3> <em>Seleccionar Empresa</em> </h3> 
        </header>
        <div class="widget-content py-3">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 d-flex justify-content-center">

                        @foreach ($empresas as $empresa)
                            
                            <div class="col-3 view overlay zoom " >
                                <form method="POST" action="" id="formEmpresa{{ $empresa->id }}" >
                                    {!! csrf_field() !!}
                                
                                    <div class="card">
                                        <div class="card-header bg-info text-center hoverable ">
                                            <h1 class="display-1"><i class="fas fa-building"></i></h1>
                                        </div>
                                        <div class="card-body text-center" id="bodyCard">
                                            <small> RUC: {{$empresa->ruc}} </small> 
                                            <p class="card-text">{{ $empresa->nombre }}</p>
                                         
                                            <button type="button" class="btn btn-outline-info btn-block" name="enviarform" id="{{ $empresa->id }}" > Ingresar </button>
                                            
                                        </div>
                                        
                                    </div>                         
                                </form>                              
                            </div>
                        @endforeach
                        <br>                       
                    </div>                  
                </div>     
        </div>    
    
</div>


@endsection


@section('scripts')

<script>
$( document ).ready( function () {

    $( ".card" ).hover(
        function() {
          $(this).addClass('shadow-lg').css( 'pointer'); 
        }, function() {
          $(this).removeClass('shadow-lg');
    });

    $('body #bodyCard').on('click', 'button', function(){
        
        $.ajax({
            url: "{{ route('config.establecer.empresa') }} ",
            method: 'post',
            datatype: 'json',
            data: { empresaid : $(this).attr('id') },
            error: function( jqXHR, textStatus, errorThrown ) {
                if( jqXHR.status == 404 ) 
                {
                    
                }
                else if( jqXHR.status == 422 ) 
                {
                    GLOBARL_settearErroresEnCampos( jqXHR, "formEmpresa" );
                }
                
            },
            success: function( data ){    
                    
                window.location = ' {{route('config.seleccionar.periodo')}} ';  
            }
        });

     })

    $('button[name="enviarform2"]').on('click', function(event){
            event.preventDefault();
           
                
    });

    function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

            let errorsRespuesta = jqXHR.responseJSON.errors;
            $.each( errorsRespuesta, function( idElemento, arrayErrores ) {

                $( "#" + idElemento ).addClass("is-invalid");
                    arrayErrores.forEach( error => {
                    MostrarNotificaciones( error , "error");
                });

            });

            //Ocultamos los errores despues de 5 segundos
            setTimeout( function() {
                $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
            }, 5000);

    }



});

</script>

@endsection
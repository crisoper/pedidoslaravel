<script>
    $(document).ready(function(){


        // $('#tableCategorias').DataTable();
$("#btneditar").on('click', function(){
    let idcategoria = $("#idcategoria").val();
    $.ajax({
        url: '{{route( "categorias.edit", '.idcategoria.' )}}',
        dataType: 'json',
        method:'get',
        data: {},
        error: function( jqXHR, textStatus, errorThrown ) {
            if( jqXHR.status == 404 ) 
            {
            }
            else if( jqXHR.status == 422 ) 
            {
                GLOBARL_settearErroresEnCampos( jqXHR, "formularioCategorias" );
            }
        },
        success: function( datos ) {
           console.log(datos);
            // editarCategoria(datos);
           
        }
    });
});
      

        $("#btnenviarFormulario").on("click", function( event ) {
        event.preventDefault();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: $("#formularioCategorias").attr("action"),
                data : $("#formularioCategorias").serialize(),
                error: function( jqXHR, textStatus, errorThrown ) {
                    if( jqXHR.status == 404 ) 
                    {
                    }
                    else if( jqXHR.status == 422 ) 
                    {
                        GLOBARL_settearErroresEnCampos( jqXHR, "formularioCategorias" );
                    }
                },
                success: function( datos ) {
                    Confirmaregistro();
                }
            });
        });
        function editarCategoria(){

        }
        
        function GLOBARL_settearErroresEnCampos( jqXHR, idElementoContenedorCampos ) {

            //Mostramos errores devueltos desde Backend
            let errorsRespuesta = jqXHR.responseJSON.errors;
            $.each( errorsRespuesta, function( idElemento, arrayErrores ) {
                $( "#" + idElemento ).addClass("is-invalid");

                // Establecemos errores para select 2
                // if( $( "#" + idElemento ).hasClass("select2") ) {
                //     $( "#" + idElemento ).parent().find("span.select2-container").addClass("is-invalid");
                //     $( "#" + idElemento ).parent().find(".select2-selection").addClass("is-invalid");
                // }

                arrayErrores.forEach( error => {
                    MostrarNotificaciones( error , "error");
                });
           });

            //Ocultamos los errores despues de 5 segundos
            setTimeout( function() {
                $("#" + idElementoContenedorCampos).find(".is-invalid").removeClass("is-invalid");
            }, 5000);

            }



        function Confirmaregistro() {
        bootbox.alert({
            message: "¡Categoria registrada correctamente!",
            callback: function () {
                window.location = $("#cancelar").attr("href");
            }
        })

        }

    });
</script>
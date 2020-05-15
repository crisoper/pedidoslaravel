<script>
    $(document).ready(function(){

        $("#btnenviarFormulario").on("click", function( event ) {
        event.preventDefault();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: $("#formularioProductos").attr("action"),
                data : $("#formularioProductos").serialize(),
                error: function( jqXHR, textStatus, errorThrown ) {
                    if( jqXHR.status == 404 ) 
                    {
                    }
                    else if( jqXHR.status == 422 ) 
                    {
                        GLOBARL_settearErroresEnCampos( jqXHR, "formularioProductos" );
                    }
                },
                success: function( datos ) {
                    console.log( datos );
                    Confirmaregistro();
                }
            });
        });
        
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
            message: "Producto registrado correctamente!",
            callback: function () {
                window.location = $("#cancelar").attr("href");
            }
        })

        }

    });
</script>
<script>
    
    $(document).ready( function() {
        
        $(".btn_realizar_pedido_cart").on("click", function( e ) {
            e.preventDefault();

            let buttonGuardar = this;

            $.ajax({
                method: "POST",
                url: $("#formNavDetallePedidoCesta").attr("action"),
                dataType: "json",
                data: $("#formNavDetallePedidoCesta").serialize() ,
                success: function( data ) {
                    
                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    // GLOBARL_MostrarNotificaciones( data.success, "info" );
                    // mesajeDatosActualizados( ) ;
                    Swal.fire({
                        icon: 'success',
                        title: 'Pedido realizado con exito',
                        showConfirmButton: false,
                        timer: 2000
                    })

                },
                error : function ( jqXHR, textStatus, errorThrown ) {

                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    GLOBARL_MostrarNotificaciones( "Error, actualice la pagina y vuelva a intentarlo", "error" );
                    console.log( jqXHR );
                }
            });
        });

    });

</script>
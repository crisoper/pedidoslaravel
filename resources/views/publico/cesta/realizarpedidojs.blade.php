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
                            title: '¡Tu pedido se ha registrado!',
                            text: "En breve nos comunicaremos contigo para detalles de entrega",
                            icon: 'success',
                            confirmButtonText: '<a href="{{route('seguimientodepedido.index')}}" style="color:#fff"> Aceptar </a>'
                          })
                    },
                    error : function ( jqXHR, textStatus, errorThrown ) {
                    
                    if( jqXHR.status == 404 ) 
                    {
                        
                    }
                    else if( jqXHR.status == 422 ) 
                    {
                        window.location = "{{route('loginOrRegister', 'login')}}";
                    }


                    $( buttonGuardar ).prop( "disabled", false ).find("span").hide();
                    // GLOBARL_MostrarNotificaciones( "Error, actualice la pagina y vuelva a intentarlo", "error" );
                    console.log( jqXHR );
                }
            });
        });

    });

</script>
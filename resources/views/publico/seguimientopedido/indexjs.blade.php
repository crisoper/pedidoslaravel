
<script>


$(document).ready(  function () {
        
    //Obtenemos los productos para el seguimiento de pedidos del cliente
    obtener_productos_pedido_seguimiento( );

    function obtener_productos_pedido_seguimiento( ) {

        $.ajax({
            url: "{{ route('ajax.seguimientodepedido') }}",
            method: 'GET',
            data: {},
            success: function ( data ) {
                // console.log(data);
                mostrar_productos_pedido_seguimiento( data )
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }

    function mostrar_productos_pedido_seguimiento( datos ) {

        console.log(datos);

        $("#cuerpo_seguimiento_pedidos").html();

        let pedidosHTML = "";

        $.each( datos.data, function( key, pedidos ) {

            let pedidodetalleHTML = '';
            $.each( pedidos.detalle, function( key, pedidosdetalle ) {
                pedidodetalleHTML = pedidodetalleHTML + `
                    <tr>
                        <td class="text-left">
                            ${ pedidosdetalle.producto }
                            <h6 class="m-0 nombre_empresa_seguimiento">${ pedidosdetalle.empresa }
                        </td>
                        <td>S/ ${ pedidosdetalle.preciounitario }</td>
                        <td>${ pedidosdetalle.cantidad }</td>
                        <td>S/ ${ pedidosdetalle.subtotal }</td>
                        
                    </tr>
                `;
            })

            
            let pedidoestadoHTML = '';
            let contadorpedidoestado = 0;
            $.each( pedidos.estado, function( key, pedidosestado ) {
                // console.log(pedidosestado);
                
                contadorpedidoestado++;
                if (contadorpedidoestado == 1) {
                    if (pedidosestado.estado == "pedido") {
                        pedidoestadoHTML = pedidoestadoHTML + `
                            <span class="span_estado_pedido">Pedido Sin Confirmar</span>
                        `;
                    }else if (pedidosestado.estado == "porentregar") {
                        pedidoestadoHTML = pedidoestadoHTML + `
                            <span class="span_estado_pedido">Pedido Confirmado</span>
                        `;
                    }else if (pedidosestado.estado == "entregado") {
                        pedidoestadoHTML = pedidoestadoHTML + `
                            <span class="span_estado_pedido">Pedido Recibido</span>
                        `;
                    }
                }

            })
            
            pedidosHTML = pedidosHTML + `
                <div class="col-12 mb-4 content_pedidos_x_confirmar">
                    <div class="row pt-2 pb-3 m-0">
                        <div class="col-12"><b>Nro. Pedido:</b> <span>${ pedidos.id }</span></div>
                        <div class="col-12"><b>Dirección de entrega:</b> <span>${ pedidos.cliente_direccion }</span></div>
                        <div class="col-12"><b>Hora de pedido:</b> <span>${ pedidos.created_at }</span></div>
                        <div class="col-12 estado_pedido_cliente"><b>Estado de pedido:</b> ${ pedidoestadoHTML } </div>
                        <div class="col-12 mt-2 mb-2">
                            <table class="table table-responsive-lg table-sm mb-2">
                                <thead>
                                    <tr class="tr_tittle_x_confirmar">
                                        <th class="prod_name text-left">Producto</th>
                                        <th class="prod_unit">Precio</th>
                                        <th class="prod_cant">Cantidad</th>
                                        <th class="prod_subtotal">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${ pedidodetalleHTML }
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-7 col-md-8 text-right">
                            <h6 class="total_pedido_seguimiento">Total: <span class="pedido_total_span_seguimiento">S/ ${ pedidos.total }</span></h6>
                        </div>
                        <div class="col-sm-5 col-md-4 text-right btn_calificar_pedido">
                            <p class="m-0">Calificar Pedido:</p>
                            <span class="my-rating-9" idpedido="${ pedidos.id }" idempresa="${ pedidos.empresa_id }"></span>
                            <span class="live-rating" idpedido="${ pedidos.id }" idempresa="${ pedidos.empresa_id }"></span>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#cuerpo_seguimiento_pedidos").html( pedidosHTML);
        activar_desativar_btn_Calificar_pedido();
        star_rating();
    }

    setInterval(obtener_productos_pedido_seguimiento, 10000);


    function star_rating() {
        $(".my-rating-9").starRating({
            initialRating: 0,
            disableAfterRate: false,
            callback: function(currentRating, $el){

                let empresa_id = $($el).attr('idempresa');
                let pedido_id = $($el).attr("idpedido");
                let calificacion = currentRating;

                agregar_estado_calificado( empresa_id, pedido_id, calificacion, "calificado" );
            }
        });
    }

    function agregar_estado_calificado( empresa_id, pedido_id, calificacion, estado, btnDespachar) {

        $.ajax({
            url: "{{ route('ajax.seguimientodepedido.store') }}",
            method: 'POST',
            data: {
                empresa_id: empresa_id,
                pedido_id: pedido_id,
                estado: estado,
                calificacion: calificacion,
            },
            success: function ( data ) {
                obtener_productos_pedido_seguimiento( );
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });
    }


    function activar_desativar_btn_Calificar_pedido() {
        $('.btn_calificar_pedido').hide();
        if ($('.span_estado_pedido').html() == 'Pedido Recibido') {
            $('.btn_calificar_pedido').show();
        }
    }

});

</script>
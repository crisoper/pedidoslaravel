
<script>


$(document).ready(  function () {
        
    //Obtenemos los productos para el seguimiento de pedidos del cliente
    obtener_productos_pedido_cliente( );

    function obtener_productos_pedido_cliente( ) {

        $.ajax({
            url: "{{ route('ajax.mispedidos') }}",
            method: 'GET',
            data: {},
            success: function ( data ) {
                // console.log(data);
                mostrar_productos_pedido_cliente( data )
            },
            error: function ( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR.responseJSON);
            }
        });

    }

    function mostrar_productos_pedido_cliente( datos ) {

        console.log(datos);

        $("#cuerpo_detalle_pedidos_cliente").html();

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
            $.each( pedidos.estado, function( key, pedidosestado ) {

                if (pedidosestado.estado == "entregado") {
                    pedidoestadoHTML = pedidoestadoHTML + `
                        <div class="col-12"><b>Hora de entrega:</b> <span>${ pedidosestado.created_at }</span></div>
                        <div class="col-12 estado_pedido_cliente">
                            <b>Estado de pedido:</b> <span class="span_estado_pedido">Pedido Recibido</span>
                        </div>
                    `;
                }

            })
            
            pedidosHTML = pedidosHTML + `
                <div class="col-12 mb-4 content_pedidos_x_confirmar">
                    <div class="row pt-2 pb-3 m-0">
                        <div class="col-12"><b>Nro. Pedido:</b> <span>${ pedidos.id }</span></div>
                        <div class="col-12"><b>Dirección de entrega:</b> <span>${ pedidos.cliente_direccion }</span></div>
                        <div class="col-12"><b>Hora de pedido:</b> <span>${ pedidos.created_at }</span></div>
                            ${ pedidoestadoHTML }
                            

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
                        <div class="col-12 text-right">
                            <h6 class="total_pedido_seguimiento">Total: <span class="pedido_total_span_seguimiento">S/ ${ pedidos.total }</span></h6>
                        </div>
                    </div>
                </div>
            `;
        });

        $("#cuerpo_detalle_pedidos_cliente").html( pedidosHTML);
    }

    setInterval(obtener_productos_pedido_cliente, 10000);


});

</script>
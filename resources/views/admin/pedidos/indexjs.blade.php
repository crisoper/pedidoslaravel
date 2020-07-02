
<script>
    
    $(document).ready(  function () {
        
        //Obtenemos los productos en pedidoss
        obtenerPedidos( );
    
        function obtenerPedidos( ) {
    
            $.ajax({
                url: "{{ route('ajax.pedidos.index') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrarPedidos( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarPedidos( datos ) {
            $("#cuerpoPedidosPorConfirmar").html();
    
            let pedidosHTML = "";
    
            $.each( datos.data, function( key, pedidos ) {

                pedidosHTML = pedidosHTML + `
                    <div class="col-12 mb-4 content_pedidos_x_confirmar">
                        <div class="row pt-2 pb-3 m-0">
                            <div class="col-12"><b>Nro. Pedido:</b> <span>${ pedidos.id }</span></div>
                            <div class="col-12"><b>Cliente:</b> <span>${ pedidos.cliente }</span></div>
                            <div class="col-12"><b>Hora de pedido:</b> <span>${ pedidos.created_at }</span></div>
                            <div class="col-12 mt-2 mb-2">
                                <table class="table table-sm mb-2">
                                    <thead>
                                        <tr class="tr_tittle_x_confirmar">
                                            <th class="prod_name text-left">Producto</th>
                                            <th class="prod_unit">Precio</th>
                                            <th class="prod_cant">Cantidad</th>
                                            <th class="prod_subtotal">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left">Producto 1</td>
                                            <td>S/ 14.90</td>
                                            <td>5</td>
                                            <td>S/ 74.50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-7 col-md-8 text-right">
                                <h6 class="total_pedido">Total: <span class="pedido_total_span">S/ ${ (pedidos.total).toFixed(2) }</span></h6>
                            </div>
                            <div class="col-sm-5 col-md-4 text-right">
                                <button class="btn_x_confirmar">Confirmar Pedido</button>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoPedidosPorConfirmar").html( pedidosHTML);
        }

        setInterval(obtenerPedidos, 3000);
    });


</script>

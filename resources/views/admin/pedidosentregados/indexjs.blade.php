
<script>
    
    $(document).ready(  function () {
        
        //Obtenemos los productos en pedidoss
        obtenerPedidosEntregados( );
    
        function obtenerPedidosEntregados( ) {
    
            $.ajax({
                url: "{{ route('ajax.pedidos.entregados.index') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrarPedidosEntregados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarPedidosEntregados( datos ) {

            console.log(datos);

            $("#cuerpoPedidosEntregados").html();
    
            let pedidosHTML = "";
    
            $.each( datos.data, function( key, pedidos ) {

                let pedidodetalleHTML = '';

                $.each( pedidos.detalle, function( key, pedidosdetalle ) {

                    pedidodetalleHTML = pedidodetalleHTML + `
                        <tr>
                            <td class="text-left">${ pedidosdetalle.producto }</td>
                            <td>S/ ${ pedidosdetalle.preciounitario }</td>
                            <td>${ pedidosdetalle.cantidad }</td>
                            <td>S/ ${ pedidosdetalle.subtotal }</td>
                        </tr>
                    `;
                })
                
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
                                        ${ pedidodetalleHTML }
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-md-12 text-right">
                                <h6 class="total_pedido">Total: <span class="pedido_total_span">S/ ${ pedidos.total }</span></h6>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoPedidosEntregados").html( pedidosHTML);
        }

        setInterval(obtenerPedidosEntregados, 3000);



                
        $("#cuerpoPedidosEntregados").on("click", ".btn_x_confirmar", function() {
            let btnDespachar = $( this );
            let empresa_id = $(btnDespachar).attr('idempresa');
            let pedido_id = $( btnDespachar).attr("idpedido");

            agregarProducto_Canasta( empresa_id, pedido_id, "entregado" );
        })

        function agregarProducto_Canasta( empresa_id, pedido_id, estado, btnDespachar) {

            $.ajax({
                url: "{{ route('ajax.pedidos.entregados.store') }}",
                method: 'POST',
                data: {
                    empresa_id: empresa_id,
                    pedido_id: pedido_id,
                    estado: estado,
                },
                success: function ( data ) {
                    obtenerPedidosEntregados( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }
    });


</script>

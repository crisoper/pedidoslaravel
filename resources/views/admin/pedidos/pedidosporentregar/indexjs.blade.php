
<script>
    
    $(document).ready(  function () {
        
        //Obtenemos los productos en pedidoss
        obtener_pedidos_por_entregar( );
    
        function obtener_pedidos_por_entregar( ) {
    
            $.ajax({
                url: "{{ route('ajax.pedidosporentregar.index') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrar_pedidos_por_entregar( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrar_pedidos_por_entregar( datos ) {

            // console.log(datos);

            $("#cuerpo_pedidos_por_entregar").html();
    
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
                            <td class="td_pedido_direccion_local">
                                <h6 class="my-0">${ pedidosdetalle.empresa }</h6>
                                <p class="my-0">${ pedidosdetalle.empresa_direccion }</p>
                            </td>
                        </tr>
                    `;
                })


                let pedidoestadoHTML = '';

                $.each( pedidos.estado, function( key, pedidosestado ) {

                    if (pedidosestado.estado == "porentregar") {
                        pedidoestadoHTML = pedidoestadoHTML + `
                            <span>${ pedidosestado.repartidor }</span>
                        `;
                    }
                })
                
                pedidosHTML = pedidosHTML + `
                    <div class="col-12 mb-4 content_pedidos_x_confirmar">
                        <div class="row pt-2 pb-3 m-0">
                            <div class="col-12"><b>Nro. Pedido:</b> <span>${ pedidos.id }</span></div>
                            <div class="col-12"><b>Cliente:</b> <span>${ pedidos.cliente }</span></div>
                            <div class="col-12"><b>Dirección:</b> <span>${ pedidos.cliente_direccion }</span></div>
                            <div class="col-12"><b>Hora de pedido:</b> <span>${ pedidos.created_at }</span></div>
                            <div class="col-12 repartidor_pedidos"><b>Repartidor:</b> ${ pedidoestadoHTML } </div>
                            <div class="col-12 mt-2 mb-2">
                                <table class="table table-responsive-lg table-sm mb-2">
                                    <thead>
                                        <tr class="tr_tittle_x_confirmar">
                                            <th class="prod_name text-left">Producto</th>
                                            <th class="prod_unit">Precio</th>
                                            <th class="prod_cant">Cantidad</th>
                                            <th class="prod_subtotal">Subtotal</th>
                                            <th class="direccion_empresa">Local</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${ pedidodetalleHTML }
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-7 col-md-8 text-right">
                                <h6 class="total_pedido">Total: <span class="pedido_total_span">S/ ${ pedidos.total }</span></h6>
                            </div>
                            <div class="col-sm-5 col-md-4 text-right">
                                <button class="btn_x_confirmar" idpedido="${ pedidos.id }" idempresa="${ pedidos.empresa_id }">Confirmar entrega de pedido</button> <br>
                                
                                <button class="btn_eliminar_pedido_tomado mt-1" idpedido="${ pedidos.id }" idempresa="${ pedidos.empresa_id }">Cancelar pedido tomado</button>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpo_pedidos_por_entregar").html( pedidosHTML);
        }

        setInterval(obtener_pedidos_por_entregar, 10000);



                
        $("#cuerpo_pedidos_por_entregar").on("click", ".btn_x_confirmar", function() {
            let btnDespachar = $( this );
            let empresa_id = $(btnDespachar).attr('idempresa');
            let pedido_id = $( btnDespachar).attr("idpedido");

            confirmar_pedido_entregado( empresa_id, pedido_id, "entregado" );
        })

        function confirmar_pedido_entregado( empresa_id, pedido_id, estado, btnDespachar) {

            $.ajax({
                url: "{{ route('ajax.pedidosporentregar.store') }}",
                method: 'POST',
                data: {
                    empresa_id: empresa_id,
                    pedido_id: pedido_id,
                    estado: estado,
                },
                success: function ( data ) {
                    obtener_pedidos_por_entregar( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }


        
        // ELIMINAR PRODUCTO DE CESTA
        $("#cuerpo_pedidos_por_entregar").on("click", ".btn_eliminar_pedido_tomado", function() {

            let spanEliminar = $( this );

            $.ajax({
                url: "{{ route('ajax.pedidosporentregar.eliminar') }}",
                method: 'POST',
                data: {
                    _method:"DELETE",
                    estado: "porentregar",
                    empresa_id: $( spanEliminar ).attr("idempresa"),
                    pedido_id: $( spanEliminar ).attr("idpedido"),
                },
                success: function ( data ) {
                    obtener_pedidos_por_entregar( );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        });

    });


</script>

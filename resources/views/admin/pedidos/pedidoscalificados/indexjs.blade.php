
<script>
    
    $(document).ready(  function () {
        
        //Obtenemos los productos en pedidoss
        obtener_pedidos_calificados( );
    
        function obtener_pedidos_calificados( ) {
    
            $.ajax({
                url: "{{ route('ajax.pedidoscalificados.index') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrar_pedidos_calificados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrar_pedidos_calificados( datos ) {

            console.log(datos);

            $("#cuerpo_pedidos_calificados").html();
    
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

                    if (pedidosestado.estado == "calificado") {
                        pedidoestadoHTML = pedidoestadoHTML + `
                            <div class="col-12"><b>Hora de calificacón:</b> <span>${ pedidosestado.created_at }</span></div>
                            <div class="col-12"><b>Calificación:</b> <span>${ pedidosestado.calificacion }</span></div>
                            <div class="col-12 repartidor_pedidos"><b>Repartidor:</b> <span>${ pedidosestado.repartidor }</span></div>
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
                            ${ pedidoestadoHTML }

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
                            <div class="col-sm-12 col-md-12 text-right">
                                <h6 class="total_pedido">Total: <span class="pedido_total_span">S/ ${ pedidos.total }</span></h6>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpo_pedidos_calificados").html( pedidosHTML);
        }

        setInterval(obtener_pedidos_calificados, 10000);


    });


</script>

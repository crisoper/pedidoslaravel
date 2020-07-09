
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_orden_menor").on("click", function() {
            obtenerProductosMasPedidos();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtenerProductosMasPedidos();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtenerProductosMasPedidos();
        });


        $(".btn_buscar_productos").on("click", function( e ) {
            e.preventDefault();

            obtenerProductosMasPedidos();
        });


        //Obtenemos los productos en maspedidoss
        obtenerProductosMasPedidos( );
    
        function obtenerProductosMasPedidos( ) {
    
            $.ajax({
                url: "{{ route('ajax.maspedidos.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    buscar: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarProductosMasPedidos( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosMasPedidos( datos ) {
    
            let maspedidossHTML = "";
    
            $.each( datos.data, function( key, maspedidos ) {

                let fotos = '';
                let contador = 0; 
                $.each( maspedidos.fotos, function( key, foto ) {
                    contador++
                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }
                });

                maspedidossHTML = maspedidossHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper mx-2 mb-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ maspedidos.id }">

                            <div class="product-img">
                                
                                ${ fotos }

                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ maspedidos.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ maspedidos.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ maspedidos.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosMasPedidos").html( maspedidossHTML);
            
            contarProductosAlFiltrar();
        }
        
        
    });


</script>

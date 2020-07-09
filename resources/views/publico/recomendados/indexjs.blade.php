
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_ofertas").on("click", function() {
            obtenerProductosRecomendados();
        });
        
        $("#filtro_nuevos").on("click", function() {
            obtenerProductosRecomendados();
        });
        
        $("#filtro_orden_menor").on("click", function() {
            obtenerProductosRecomendados();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtenerProductosRecomendados();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtenerProductosRecomendados();
        });


        $(".btn_buscar_productos").on("click", function( e ) {
            e.preventDefault();

            obtenerProductosRecomendados();
        });
      


        //OBTENER LOS PRODUCTOS RECOMENDADOS
        obtenerProductosRecomendados( );
    
        function obtenerProductosRecomendados( ) {
    
            $.ajax({
                url: "{{ route('ajax.recomendados.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    buscar: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarProductosRecomendados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosRecomendados( datos ) {
    
            let recomendadosHTML = "";
    
            $.each( datos.data, function( key, recomendado ) {

                let fotos = '';
                let contador = 0; 
                $.each( recomendado.fotos, function( key, foto ) {
                    contador++
                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }
                });

                recomendadosHTML = recomendadosHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper abrir_modal_productos mx-2 mb-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ recomendado.id }">

                            <div class="product-img">
                                
                                ${ fotos }

                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ recomendado.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ recomendado.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ recomendado.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosRecomendados").html( recomendadosHTML);
            contarProductosAlFiltrar();
        }

        
    });


</script>

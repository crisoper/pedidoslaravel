
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_orden_menor").on("click", function() {
            obtenerProductosOfertados();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtenerProductosOfertados();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtenerProductosOfertados();
        });


        $(".btn_buscar_productos").on("click", function( e ) {
            e.preventDefault();

            obtenerProductosOfertados();
        });



        //OBTENER LOS PRODUCTOS RECOMENDADOS
        obtenerProductosOfertados( );
    
        function obtenerProductosOfertados( ) {
    
            $.ajax({
                url: "{{ route('ajax.ofertas.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    buscar: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarProductosOfertados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosOfertados( datos ) {

            let ofertassHTML = "";
    
            $.each( datos.data, function( key, ofertas ) {

                let fotos = '';
                let contador = 0; 
                $.each( ofertas.fotos, function( key, foto ) {
                    contador++
                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="m-0">`;
                    }
                });

                ofertassHTML = ofertassHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper abrir_modal_productos mx-2 mb-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ ofertas.id }">

                            <div class="product-img">
                                
                                ${ fotos }

                            </div>
                            
                            <div class="featured__item__text p-2">
                                <div class="row mx-0">
                                    <div class="col-12">
                                        <p class="nombre_producto text-truncate my-0">${ ofertas.nombre }</p>
                                        <p class="nombre_empresa text-truncate my-0">${ ofertas.empresa }</p>
                                        <h4 class="content_precio_producto mt-2">
                                            S/ <span class="precio_producto">${ ofertas.precio }</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosOfertados").html( ofertassHTML);

            contarProductosAlFiltrar();
        }


    });

</script>

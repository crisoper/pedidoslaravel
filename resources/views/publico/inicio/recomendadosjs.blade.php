
<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos recomendados
        obtenerProductosRecomendados( );
    
        function obtenerProductosRecomendados( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.recomendados') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrarProductosRecomendados( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosRecomendados( datos ) {
            $("#cuerpoProductosRecomendados").html();
    
            let carHTML = "";
    
            $.each( datos.data, function( key, recomendados ) {
                carHTML = carHTML + `
                    <div class="single_product_wrapper single_product_wrapper_rec mx-2 mb-5">
                        <div class="product-img">
                            {{-- <img src="{{ URL::to('/') }}/storage/img_productos/.${ foto.nombre }"
                                alt="${ foto.nombre }"> --}}
    
                            <!-- Product Badge -->
                            <div class="product-badge empresa_badge">
                                <p class="text-truncate p-0">Nombre de empresa</p>
                            </div>
                            {{-- <div class="product-badge empresa_direccion_badge">
                                <p class="text-truncate small p-0">Dirección de empresa</p>
                            </div> --}}
                        </div>
                        
                        <div class="featured__item__text container_product_cart featured__item__text_recomendados px-2">
                            <p class="text-truncate mb-0"><a class="link_producto_detalle" href="#"><b>${ recomendados.nombre }</b></a></p>
                            <p class="text-truncate small my-0">${ recomendados.descripcion }</p>
                            <hr class="my-0">
                            <div class="pt-1 pr-2">
                                {{-- <h5 class="text-center"><small>Precio:</small><span class="text-success">${ recomendados.precio }</span></h5> --}}
                                <h5 class="text-right"><small>Precio:</small><span class="text-success">${ recomendados.precio }</span></h5>
                                <p class="my-0 py-0">
                                    <span><s>P. Normal: <br><b> S/ 20.90</b></s></span> 
                                </p>
                            </div>
                            <hr class="my-1">
                            <div class="row px-1">
                                <div class="col-7 py-0">
                                    <div class="input_group_unit_product border m-0">
                                        <input type="text" class="text-center input_value_cart" value="1">
                                    </div>
                                </div>
                                <div class="col-5 text-center text-muted">
                                    <p class="small py-0 my-0">Importe:</p>
                                    <h4 class="small"><b>S/ 15.90</b></h4>
                                </div>
                            </div>
                            <hr class="mt-0 mb-1">
                            <div class="row mb-2 px-3">
                                <div class="col-8 p-0">
                                    <button class="agregar_cart" idproducto="${ recomendados.id }">Agregar 
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                                <div class="col-2 p-0">
                                    <button class="agregar_favoritos">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </div>
                                <div class="col-2 p-0">
                                    <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosRecomendados").html( carHTML);
        } 
    });


</script>

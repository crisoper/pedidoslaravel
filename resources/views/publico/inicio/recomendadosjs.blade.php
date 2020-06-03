
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
                            <img 
                            src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                            alt="{{ $productorecomendado->nombre }}"
                            @if ( $loop->iteration == 2 )
                                class="hover-img"
                            @endif
                            > 

                            <!-- Product Badge -->
                            <div class="product-badge empresa_badge">
                                <p class="text-truncate p-0">Nombre de empresa</p>
                            </div>
                            {{-- <div class="product-badge empresa_direccion_badge">
                                <p class="text-truncate small p-0">Dirección de empresa</p>
                            </div> --}}
                        </div>


                        <!-- Product Description -->
                        <div class="featured__item__text container_product_cart featured__item__text_recomendados px-2 pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-truncate my-0">
                                        <a class="link_producto_detalle" href="#"><b>${ recomendados.nombre }</b></a>
                                    </p>
                                    <p class="text-truncate small my-0">${ recomendados.descripcion }</p>
                                </div>
                            </div>
                            <hr class="mt-1 mb-0">
                            <div class="row px-2">
                                <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                    <p class="price_product_prev text-muted py-0 my-0">
                                        S/ <span>20.90</span>
                                    </p>
                                    <h4 class="price_product_unit my-0">
                                        S/ <span>${ recomendados.precio }</span>
                                    </h4>
                                </div>
                                <div class="col-6 pt-1 pb-2 px-2 m-0">
                                    <p class="import_price text-muted py-0 my-0">
                                        Importe: <b>S/ <span>15.90</span></b>
                                    </p>
                                    <div class="input_group_unit_product border m-0">
                                        <input type="text" class="text-center input_value_cart" value="1">
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0 mb-2">
                            <div class="row mb-2 px-3">
                                <div class="col-2 p-0">
                                    <button class="abrir_modal_producto" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div class="col-2 p-0">
                                    <button class="agregar_favoritos">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </div>
                                <div class="col-8 p-0">
                                    <button class="agregar_cart" idproducto="${ recomendados.id }">
                                        <span>Agregar</span>
                                        <i class="fas fa-shopping-basket"></i>
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

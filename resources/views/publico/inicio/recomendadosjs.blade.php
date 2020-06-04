
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
                    mostrarProductosRecomendados( data );

                    $('.slick').slick();
                    $('.slick2').slick();
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosRecomendados( datos ) {
            $("#cuerpoProductosRecomendados").html();
    
            let recomendadosHTML = "";
    
            $.each( datos.data, function( key, recomendados ) {

                let fotos = '';

                $.each( recomendados.fotos, function( key, foto ) {
                    fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }">`;
                });                

                recomendadosHTML = recomendadosHTML + `
                    <div class="single_product_wrapper single_product_wrapper_rec mx-2 mb-5 col-sm-6 col-md-4">
                        <div class="product-img">
                            
                            ${ fotos }

                            <!-- Product Badge -->
                            <div class="product-badge empresa_badge">
                                <p class="text-truncate p-0">Nombre de empresa</p>
                            </div>
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
    
            $("#productosRecomendados").html( recomendadosHTML, function() {
                $('.slick').slick({
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    arrows: true
                });
            });
        } 
    });


</script>

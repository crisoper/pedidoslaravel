
<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos ofertas
        obtenerProductosEnOfertaInicio( );
    
        function obtenerProductosEnOfertaInicio( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.ofertas') }}",
                method: 'GET',
                data: {},
                success: function ( data ) {
                    mostrarProductosEnOfertaInicio( data );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosEnOfertaInicio( datos ) {
            $("#cuerpoProductosEnOfertaInicio").html();
    
            let ofertasHTML = "";
    
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
                
                
                let enlistadeseos = '';
                if (ofertas.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos  hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="${ ofertas.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a mi lista de deseos" idproducto="${ ofertas.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (ofertas.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ ofertas.id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </button>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ ofertas.id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>`;
                }

                ofertasHTML = ofertasHTML + `
                    <div class="single_product_wrapper single_product_wrapper_rec mx-2 p-0 mb-3 col-sm-6 col-md-4">
                        <div class="product-img">
                            
                            ${ fotos }

                            <!-- Product Badge -->
                            <div class="product-badge empresa_badge p-0">
                                <a target="blank" href="{{route('empresas1.index')}}" class="text-truncate p-0">${ ofertas.empresa }</a>
                            </div>
                            <div class="product-badge offer-badge">
                                <span>Oferta</span>
                            </div>
                        </div>


                        <!-- Product Description -->
                        <div class="featured__item__text container_product_cart featured__item__text_ofertas px-2 pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-truncate my-0"><b>${ ofertas.nombre }</b></p>
                                    <p class="text-truncate small my-0">${ ofertas.descripcion }</p>
                                </div>
                            </div>
                            <hr class="mt-1 mb-0">
                            <div class="row px-2">
                                <div class="col-6 pt-1 pb-2 px-0 m-0" id="price_product_border">
                                    <p class="price_product_prev text-muted py-0 my-0">
                                        S/ <span>20.90</span>
                                    </p>
                                    <h4 class="price_product_unit my-0">
                                        S/ <span>${ ofertas.precio }</span>
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
                                    <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ ofertas.id }">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                ${ enlistadeseos }
                                ${ encarrito }
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosEnOfertaInicio").html( ofertasHTML);
            sliderEnOfertasInicio();
        }

        

        function sliderEnOfertasInicio() {
            $(".responsiveSlickEnOfertasInicio").slick({
                slidesToShow: 5,
                slidesToScroll: 5,
                arrows: true,
                dots: true,
                infinite: true,
                speed: 800,
                autoplay: true,
                autoplaySpeed: 4000,
                appendArrows: $(".slickArrowsEnOfertasInicio"),
                prevArrow:
                    '<button class="slick-prev" type="button"><i class="fa  fa-angle-left"></i></button>',
                nextArrow:
                    '<button class="slick-next" type="button"><i class="fa  fa-angle-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });

        }
        
    });


</script>

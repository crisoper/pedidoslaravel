
<script>

    function mostrarProductosEnOfertaInicio( datos ) {
        // $("#cuerpoProductosEnOfertaInicio").html();
        console.log(datos);

        let ofertasHTML = "";

        $.each( datos, function( key, ofertas ) {


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
            
            if ( (ofertas.oferta_diainicio <= ofertas.diaactual) && (ofertas.oferta_diafin >= ofertas.diaactual) ) {
                ofertasHTML = ofertasHTML + `
                    <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ ofertas.id }">

                        <div class="product-img">
                            ${ fotos }
                        </div>
                        
                        <div class="featured__item__text p-2">
                            <div class="row mx-0">
                                <div class="col-12">
                                    <p class="nombre_producto text-truncate my-0">${ ofertas.nombre }</p>
                                    <p class="nombre_empresa text-truncate my-0">${ ofertas.empresa }</p>
                                </div>
                                <div class="col-12 p-0">
                                    <div class="row mx-0">
                                        <div class="col-6 p-0 text-center">
                                            <h5 class="price_product_offer mt-2 pt-1">
                                                S/ <span class="precio_producto">${ ofertas.precio }</span>
                                            </h5>
                                        </div>
                                        <div class="col-6 p-0 text-center">
                                            <h4 class="content_precio_producto mt-2">
                                                S/ <span class="precio_producto">${ ofertas.oferta }</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                `;
            } else {
                ofertasHTML = ofertasHTML + `
                    <div class="single_product_wrapper abrir_modal_productos m-3" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ ofertas.id }">

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
                `;
            }

        });

        $("#cuerpoProductosEnOfertaInicio").html( ofertasHTML);
        sliderEnOfertasInicio();
    }

    

    function sliderEnOfertasInicio() {
        $(".responsiveSlickEnOfertasInicio").slick({
            dots: false,
            arrows: true,
            slidesToShow: 4,
            slidesToScroll: 4,
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
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    },
                },
                {
                    breakpoint: 991,
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
        
</script>

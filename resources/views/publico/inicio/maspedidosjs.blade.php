
<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos en ofertas
        obtenerProductosMasPedidos( );
    
        function obtenerProductosMasPedidos( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.maspedidos') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
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
            $("#cuerpoProductosMasPedidos").html();
    
            let masPedidosHTML = "";
    
            $.each( datos.data, function( key, maspedido ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( maspedido.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }">`;
                    }

                });  

                let enlistadeseos = '';
                // console.log( typeof( maspedido.encarrito ) );
                if (maspedido.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="${ maspedido.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a mi lista de deseos" idproducto="${ maspedido.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (maspedido.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ maspedido.id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </button>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ maspedido.id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>`;
                }

                masPedidosHTML = masPedidosHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosMasPedidos wow fadeInUpBig mb-0" data-wow-delay="0.4s">
                        <div class="single_product_wrapper mb-5">
                            <div class="product-img">
                                ${ fotos }
                            </div>
                            
                            
                            <div class="featured__item__text container_product_cart px-3">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-truncate my-0">
                                            <a class="link_producto_detalle" href="#"><b>${ maspedido.nombre }</b></a>
                                        </p>
                                        <p class="text-truncate small my-0">${ maspedido.descripcion }</p>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-0">
                                <div class="row px-2">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                        {{-- <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p> --}}
                                        <p class="small"></p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span>${ maspedido.precio }</span>
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
                                        <button class="abrir_modal_producto hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    ${ enlistadeseos }
                                    ${ encarrito }
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosMasPedidos").html( masPedidosHTML);
            sumarRestarCantidad();
            menuProductos();
        }

        
        function sumarRestarCantidad() {
            
            var proQty = $('.input_group_unit_product');
            proQty.prepend('<button class="minus MoreMinProd"><b>-</b></button>');
            proQty.append('<button class="more MoreMinProd"><b>+</b></button>');
            $('.input_group_unit_product').on('click', '.MoreMinProd', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('more')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.parent().find('input').val(newVal);
            });
        }


        function menuProductos() {
            $('.portfolio-menu button.btn').on('click', function () {
                $('.portfolio-menu button.btn').removeClass('active');
                $(this).addClass('active');
            })

            // :: 6.0 Masonary Gallery Active Code
            if ($.fn.imagesLoaded) {
                $('.karl-new-arrivals').imagesLoaded(function () {
                    // filter items on button click
                    $('.portfolio-menu').on('click', 'button', function () {
                        var filterValue = $(this).attr('data-filter');
                        $grid.isotope({
                            filter: filterValue
                        });
                    });
                    // init Isotope
                    var $grid = $('.karl-new-arrivals').isotope({
                        itemSelector: '.single_gallery_item',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.single_gallery_item'
                        }
                    });
                });
            }
        }


    });


</script>

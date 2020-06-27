
<script>
    
    $(document).ready(  function () {
        
        $("#filtro_orden_menor").on("click", function() {
            obtenerProductosNuevos();
        });
        
        $("#filtro_orden_mayor").on("click", function() {
            obtenerProductosNuevos();
        });
        
        $("#filtro_orden_ofertas").on("click", function() {
            obtenerProductosNuevos();
        });


        $(".btn_buscar_productos").on("click", function( e ) {
            e.preventDefault();

            obtenerProductosNuevos();
        });


        //Obtenemos los productos en nuevoss
        obtenerProductosNuevos( );
    
        function obtenerProductosNuevos( ) {
    
            $.ajax({
                url: "{{ route('ajax.nuevos.index') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                    buscar: $("#txtBuscarTextoGeneral").val(),
                    filtro_nuevos: $("#filtro_nuevos").is(':checked')  ? 1 : 0,
                    filtro_ofertas: $("#filtro_ofertas").is(':checked')  ? 1 : 0,
                    filtro_orden: $("input[name='fitroorden']:checked").val(),
                },
                success: function ( data ) {
                    mostrarProductosNuevos( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosNuevos( datos ) {
            $("#cuerpoProductosNuevos").html();
    
            let nuevossHTML = "";
    
            $.each( datos.data, function( key, nuevos ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( nuevos.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }">`;
                    }

                });  

                let enlistadeseos = '';
                // console.log( typeof( nuevos.encarrito ) );
                if (nuevos.enlistadeseos == false) {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a mi lista de deseos" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                }

                let encarrito = '';
                if (nuevos.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ nuevos.empresa_url }" class="agregar_cart hint--top" data-hint="Agregar producto a cesta" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <a href="${ nuevos.empresa_url }" class="product_aggregate_cesta hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ nuevos.id }" idempresa="${ nuevos.empresa_id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </div>`;
                }

                nuevossHTML = nuevossHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="single_product_wrapper">
                            <div class="product-img">

                                ${ fotos }
                                
                                <span class="empresa_badge">
                                    <a target="blank" href="${ nuevos.empresa_url }" class="row">
                                        <p class="text-truncate m-0 p-0">${ nuevos.empresa }</p>
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </span>
                                <div class="product-badge offer-badge">
                                    <span>Oferta</span>
                                </div>
                            </div>
                            
                            
                            <div class="featured__item__text container_product_cart px-2 pt-2 mb-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-truncate my-0">
                                            <a class="link_producto_detalle" href="#"><b>${ nuevos.nombre }</b></a>
                                        </p>
                                        <p class="text-truncate small my-0">${ nuevos.descripcion }</p>
                                    </div>
                                </div>
                                <hr class="mt-1 mb-0">
                                <div class="row px-2 conten_precio_cantidad">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                        {{-- <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p> --}}
                                        <p class="small"></p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span class="precio_producto">${ nuevos.precio }</span>
                                        </h4>
                                    </div>
                                    <div class="col-6 pt-1 pb-2 px-2 m-0">
                                        <p class="import_price text-muted py-0 my-0">
                                            Importe: <b>S/ <span class="importe_producto">${ nuevos.precio }</span></b>
                                        </p>
                                        <div class="input-group input_group_unit_product">
                                            <button class="input-group-prepend minus MoreMinProd d-flex justify-content-around">-</button>
                                            <input type="text" class="form-control input_value_cart" value="1">
                                            <button class="input-group-append more MoreMinProd d-flex justify-content-around">+</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="row modal_lista_cart mx-1 mb-2 text-center">
                                    <div class="col-2 p-0">
                                        <button class="abrir_modal_producto_inicio hint--top-right" data-hint="Detalle de producto" data-toggle="modal" data-target="#abrir_modal_producto_inicio" idproducto="${ nuevos.id }">
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
    
            $("#cuerpoProductosNuevos").html( nuevossHTML);
            sumarRestarCantidad();
            contarProductosAlFiltrar();
        }



        $(".contenidoPrincipalPagina").on("click", ".abrir_modal_producto_inicio", function() {

            let btn = $( this );

            $.ajax({
                url: "{{ route('ajax.productos.getdatosxid') }}",
                method: 'GET',
                data: {
                    idproducto: $( btn ).attr("idproducto")
                },
                success: function ( data ) {
                    llenarDatosModalProductoDetalle( data );
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        });
        
        function llenarDatosModalProductoDetalle( data ) {
            
            crearImagenesProducto( data.data.fotos );

            let enlistadeseos = '';
            if (data.data.enlistadeseos == false) {
                enlistadeseos = enlistadeseos + `
                    <button class="agregar_lista_deseos  hint--top-left" data-hint="Agregar a lista de deseos" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <i class="fa fa-heart"></i>
                    </button>`;
            } else {
                enlistadeseos = enlistadeseos + `
                    <button class="product_agreggate_listadeseos hint--top-left hint--success" data-hint="Agregado a lista de deseos" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <i class="fa fa-heart"></i>
                    </button>`;
            }

            let encarrito = '';
            if (data.data.encarrito == false) {
                encarrito = encarrito + `
                    <a href="${ data.data.empresa_url }" class="agregar_cart text-center hint--top" data-hint="Agregar producto a cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <span>Agregar</span>
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                `;
            } else {
                encarrito = encarrito + `
                    <a href="${ data.data.empresa_url }" class="product_aggregate_cesta text-center hint--top hint--success" data-hint="Producto agregado en cesta" idproducto="${ data.data.id }" idempresa="${ data.data.empresa_id }">
                        <span>Agregado</span>
                        <i class="fas fa-check-circle"></i>
                    </a>
                `;
            }

            let productoModalHTML = "";
            productoModalHTML = productoModalHTML + `
                <div class="col-12">
                    <div class="row container_product_cart">
                        <div class="col-12">
                            <h4 id="titulo_producto_modal">${data.data.nombre}</h4>
                        </div>
                        <div class="col-6 col-sm-5 col-md-4">
                            <div class="top_seller_product_rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-6 col-sm-5 col-md-8">
                            <p class="stock_modal">
                                Stock: <span id="stock_modal_span">${data.data.stock}</span>
                            </p>
                        </div>
                        <div class="col-12">
                            <h3 class="precio_modal_lista_deseos my-0">
                                S/ <span id="precio_modal_lista_deseos_span">${data.data.precio}</span>
                            </h3>
                        </div>
                        <div class="col-12">
                            <p id="descripcion_producto_modal">${data.data.descripcion}</p>
                        </div>
                        <div class="col-12"><hr></div>
                        <div class="col-5">
                            <div class="input-group input_group_unit_product">
                                <button class="input-group-prepend restar sumarRestarProdModal d-flex justify-content-around">-</button>
                                <input type="text" class="form-control input_value_cart" value="1">
                                <button class="input-group-append sumar sumarRestarProdModal d-flex justify-content-around">+</button>
                            </div>
                            <p class="import_price text-muted text-center mt-1 mb-0">
                                Importe: <b>S/ <span class="importe_producto_modal">${ data.data.precio }</span></b>
                            </p>
                        </div>
                        <div class="col-4 content_btn_cesta_modal">
                            ${ encarrito }
                        </div>
                        <div class="col-2 content_btn_favoritos_modal">
                            ${ enlistadeseos }
                        </div>
                    </div>
                </div>
            `;
            $(".content_producto_modal").html( productoModalHTML );
            
            sumarRestarCantidadModal();
        }

        function crearImagenesProducto( fotos ) {
            let html = ""; 
            $.each( fotos, function( key, foto ) {        
                html = html + `
                    <a class="lightbox" href="#${ foto.nombre }">
                        <img src="${ foto.url }">
                    </a>
                    <div class="lightbox-target" id="${ foto.nombre }">
                        <img src="${ foto.url }">
                        <a class="lightbox-close" href="#"></a>
                    </div>
                `
            });

            $("#imagenes_producto_modal").html( html );
        }


        
        function sumarRestarCantidad() {
            
            $('.input_group_unit_product').on('click', '.MoreMinProd', function () {
                var botonMoreMin = $(this);

                var valorActual = botonMoreMin.parent().find('input').val();
                var precio = botonMoreMin.parents('.conten_precio_cantidad').find('.precio_producto').html();
                
                if (botonMoreMin.hasClass('more')) {
                    var nuevoValor = parseFloat(valorActual) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (valorActual > 1) {
                        var nuevoValor = parseFloat(valorActual) - 1;
                    } else {
                        nuevoValor = 1;
                    }
                }

                botonMoreMin.parent().find('input').val(nuevoValor);
                botonMoreMin.parents('.conten_precio_cantidad').find('.importe_producto').html((nuevoValor * precio).toFixed(2));

            });
        }

        function sumarRestarCantidadModal() {
            
            $('.input_group_unit_product').on('click', '.sumarRestarProdModal', function () {
                var botonMoreMin = $(this);

                var valorActual = botonMoreMin.parent().find('input').val();
                var precio = botonMoreMin.parents('.container_product_cart').find('#precio_modal_lista_deseos_span').html();
                
                console.log(precio);

                if (botonMoreMin.hasClass('sumar')) {
                    var nuevoValor = parseFloat(valorActual) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (valorActual > 1) {
                        var nuevoValor = parseFloat(valorActual) - 1;
                    } else {
                        nuevoValor = 1;
                    }
                }

                botonMoreMin.parent().find('input').val(nuevoValor);
                botonMoreMin.parents('.container_product_cart').find('.importe_producto_modal').html((nuevoValor * precio).toFixed(2));

            });
        }

        
        function contarProductosAlFiltrar() {
            let contarProductos = $('.single_product_wrapper').length;
            $(".nro_productos_buscados").html(contarProductos);
        }

        
    });


</script>


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
                        <button class="agregar_lista_deseos hint--top-right" data-hint="Agregar a mi lista de deseos" idproducto="${ nuevos.id }">
                            <i class="fa fa-heart"></i>
                        </button>
                    </div>`;
                } else {
                    enlistadeseos = enlistadeseos + `<div class="col-2 p-0">
                        <button class="product_agreggate_listadeseos hint--top-right hint--success" data-hint="Agregado a mi lista de deseos" idproducto="${ nuevos.id }">
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
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="single_product_wrapper mb-5">
                            <div class="product-img">

                                ${ fotos }
                                
                                <span class="empresa_badge">
                                    <a target="blank" href="${ nuevos.empresa_url }" class="row">
                                        <p class="text-truncate m-0 p-0">${ nuevos.empresa }</p>
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </span>
                                <div class="product-badge new-badge">
                                    <span>Nuevo</span>
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
                                <div class="row px-2">
                                    <div class="col-6 pt-1 pb-2 px-0 m-0 text-center" id="price_product_border">
                                        {{-- <p class="price_product_prev text-muted py-0 my-0">
                                            S/ <span>20.90</span>
                                        </p> --}}
                                        <p class="small"></p>
                                        <h4 class="price_product_unit my-0">
                                            S/ <span>${ nuevos.precio }</span>
                                        </h4>
                                    </div>
                                    <div class="col-6 pt-1 pb-2 px-2 m-0">
                                        <p class="import_price text-muted py-0 my-0">
                                            Importe: <b>S/ <span>15.90</span></b>
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

        
        function sumarRestarCantidad() {
            
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

        
        function contarProductosAlFiltrar() {
            let contarProductos = $('.single_product_wrapper').length;
            $(".nro_productos_buscados").html(contarProductos);
        }

        
    });


</script>

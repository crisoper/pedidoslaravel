
<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos en ofertas
        obtenerProductosEnOferta( );
    
        function obtenerProductosEnOferta( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.ofertas') }}",
                method: 'GET',
                data: {
                    storagecliente_id: obtenerLocalStorageclienteID (),
                },
                success: function ( data ) {
                    mostrarProductosEnOferta( data )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });
    
        }
    
        function mostrarProductosEnOferta( datos ) {
            $("#cuerpoProductosEnOferta").html();
    
            let ofertasHTML = "";
    
            $.each( datos.data, function( key, oferta ) {

                let fotos = '';

                let contador = 0; 
                
                $.each( oferta.fotos, function( key, foto ) {
                    
                    contador++

                    if (contador == 2) {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }" class="hover-img">`;
                    } else {
                        fotos = fotos + `<img src="${ foto.url }" alt="${ foto.nombre }">`;
                    }

                });  

                let encarrito = '';

                console.log( typeof( oferta.encarrito ) );

                if (oferta.encarrito == false) {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="agregar_cart" idproducto="${ oferta.id }">
                            <span>Agregar</span>
                            <i class="fas fa-shopping-basket"></i>
                        </button>
                    </div>`;
                } else {
                    encarrito = encarrito + `<div class="col-8 p-0">
                        <button class="product_aggregate" idproducto="${ oferta.id }">
                            <span>Agregado</span>
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </div>`;
                }

                ofertasHTML = ofertasHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosOfertas wow fadeInUpBig mb-0" data-wow-delay="0.2s">
                        <div class="single_product_wrapper mb-5">
                            <div class="product-img">
                                ${ fotos }
                            </div>
                            
                            
                            <div class="featured__item__text container_product_cart px-3">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-truncate my-0">
                                            <a class="link_producto_detalle" href="#"><b>${ oferta.nombre }</b></a>
                                        </p>
                                        <p class="text-truncate small my-0">${ oferta.descripcion }</p>
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
                                            S/ <span>${ oferta.precio }</span>
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
                                    ${ encarrito }
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
    
            $("#cuerpoProductosEnOferta").html( ofertasHTML);
        } 
    });


</script>

<script>
    
    $(document).ready(  function () {
        //Obtenemos los productos en ofertas
        obtenerProductosMasPedidos( );
    
        function obtenerProductosMasPedidos( ) {
    
            $.ajax({
                url: "{{ route('ajax.productos.maspedidos') }}",
                method: 'GET',
                data: {},
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
    
            let carHTML = "";
    
            $.each( datos.data, function( key, maspedido ) {
                carHTML = carHTML + `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 single_gallery_item productosOfertas wow fadeInUpBig mb-0" data-wow-delay="0.2s">
                        <div class="single_product_wrapper mb-5">
                            <div class="product-img">
                                {{--@foreach ($productooferta->fotos as $foto)
                                    <img 
                                    src="{{ asset( Storage::disk('img_productos')->url('img_productos/').$foto->nombre ) }}" 
                                    src="{{ Storage::url("img_productos/".$foto->nombre)}}" 
                                    alt="{{ $productooferta->nombre }}"
                                    @if ( $loop->iteration == 2 )
                                        class="hover-img"
                                    @endif
                                    >
                                @endforeach--}}

                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>Oferta</span>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="featured__item__text container_product_cart px-3">
                                <h6 class="text-truncate mb-0"><b>${ maspedido.nombre }</b></h6>
                                <p class="text-truncate small my-0">${ maspedido.descripcion }</p>
                                <hr class="my-0">
                                <div class="pt-1">
                                    <h4 class="text-center"><small><small>Precio: </small></small><span class="text-success"><b>${ maspedido.precio }</b></span></h4>
                                    <h4 class="text-right"><small><small>Precio: </small></small><span class="text-success"><b>${ maspedido.precio }</b></span></h4>
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
                                        <button class="agregar_cart" idproducto="${ maspedido.id }">Agregar 
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
                    </div>
                `;
            });
    
            $("#cuerpoProductosMasPedidos").html( carHTML);
        } 
    });

</script>
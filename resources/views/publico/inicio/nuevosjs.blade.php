<script>
    $(document).ready(  function () {

        obtenerProductosNuevos( "{{ route('ajax.productos.nuevos') }}" );

        function obtenerProductosNuevos( link ) {

            $.ajax({
                url: link,
                method: 'GET',
                data: {},
                success: function ( datos ) {
                    // console.log( datos );
                    contruirSeccionProductosNuevos( datos )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

        function contruirSeccionProductosNuevos( datos ) {
            
            $("#seccionProductosNuevo").html("");

            let html = '<div class="latest-prdouct__slider__item">';

            $.each( datos.data, function( key, producto ) {

                html = html + `
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="pedidos/img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>${ producto.nombre }</h6>
                            <span>${ producto.precio }</span>
                        </div>
                    </a>
                
                `;

                if( ( key + 1 ) % 3 == 0) {
                    
                    html = html + `</div>`;
                    if ( ( key + 1 ) < 9 ) {
                        html = html + `<div class="latest-prdouct__slider__item">`;
                    }
                }


                
            });

            $("#seccionProductosNuevo").html( html );

        }

    });
</script>
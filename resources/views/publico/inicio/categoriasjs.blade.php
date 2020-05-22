<script>
    $(document).ready(  function () {

        obtenerListadoCategorias( "{{ route('ajax.categorias.inicio') }}" );


        function obtenerListadoCategorias( link ) {

            $.ajax({
                url: link,
                method: 'GET',
                data: {},
                success: function ( datos ) {
                    contruirMenuCategorias( datos )
                },
                error: function ( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR.responseJSON);
                }
            });

        }

        function contruirMenuCategorias( datos ) {
            
            $("#menuCategorias").html("");

            let html = '';

            $.each( datos.data, function( key, categoria ) {

                html = html + `<li><a href="#" value="${ categoria.id }">${ categoria.nombre }</a></li>`;
            });

            $("#menuCategorias").html( html );

        }

    });
</script>
<script>
    $(document).ready(  function () {

        $.ajax({
            method: "GET",
            url: "{{ route('ajax.productos.inicio') }}",
            dataType: "json",
            data: {
                // $("#formContratosCreate").serialize()
            },
            success: function( data ) {
                
                console.log( data );

            },
            error : function ( jqXHR, textStatus, errorThrown ) {

                console.log( jqXHR );

            }
        });

    });
</script>
@extends('layouts.admin.admin')

@section('contenido')


<div class="col">

    <div class="row">
        @include('layouts.admin.dashboardhome.vistaAdministrador')
    </div>

    <div class="row">
        
        @if ( $flag == 'home' )
             @include('admin.administrador_includes.principal')
        @elseif ( $flag == 'productos' )
             @include('admin.administrador_includes.producto')
        @endif

    </div>
</div>


@endsection

@section('scripts')
<script>
    $( document ).ready( function () {
            $( ".card" ).hover(
                function() {
                $(this).addClass('shadow-lg').css( 'pointer'); 
                }, function() {
                $(this).removeClass('shadow-lg');
            });

    $(windows).on('load', function(){
        $.ajax({
            url:"route('getproductosmasvendidos')",
            method: "get",
            dataType:"json",
            data:{},
            success: function( data ){

                let = productos = '<tr>'
                $.each('data', function(index, producto){

                // console.log(producto);
                    $("#tbl_productosmasvendidos").html(
                        "<tr>"+
                            "<td>"+ producto+" </td>"+
                            "<td>"+ cantidad+" </td>"+
                            // "<td>"+ producto.fecha+" </td>"+                        
                        "</tr>"
                    );
                });


            }
        });
    })
        
        })
</script>
@endsection
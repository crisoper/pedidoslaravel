@extends('layouts.admin.admin')

@section('contenido')


<div class="col-12">


  
        @if ( $flag == 'SuperAdministrador' )
            @include('layouts.admin.dashboardhome.vistaSuperadministrador')
        @elseif ( $flag == 'Administrador' )     
            @include('layouts.admin.dashboardhome.vistaAdministrador')
             {{-- @include('admin.administrador_includes.producto') --}}
        @elseif($flag == 'Distribuidor' )
        @include('layouts.admin.dashboardhome.vistaDistribuidor')
        @endif

   
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
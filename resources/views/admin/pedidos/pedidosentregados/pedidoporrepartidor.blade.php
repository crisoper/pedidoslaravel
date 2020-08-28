@extends('layouts.admin.admin')

@can('productos.listar')
@section('contenido')
@include('layouts.admin.messenger')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-11">
                            <h3>Pedidos Entregados</h3>
                        </div>
                        <div class="mb-3 text-center col-1">
                            <a title="Ir a principal" class="" href="{{Route('home')}}">
                                <h4><i class="fas fa-reply "></i></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-12 form-row ">

                        <div class="form-group col-sm-12 col-md-6">
                            <span>Filtrar Por Distribuidor:</span>

                            <select id="distribuidor" class="form-control" name="distribuidor">
                                <option value="todos">Todos</option>
                                @foreach ($rol->users as $user)
                                <option value="{{$user->id}}">{{ $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-3">
                            <span>Desde:</span>
                            <input type="date" name="desde" id="desde" class="form-control  ">
                        </div>
                        <div class="form-group  col-sm-6 col-md-3">
                            <span>Hasta:</span>
                            <input type="date" name="hasta" id="hasta" class="form-control ">
                        </div>

                    </div>


                    <div class="col-12">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Cod. Pedido</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Empresa</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_pedidos">
                                    @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>000-{{$pedido->id}}</td>
                                        <td>{{$pedido->cliente->name}}</td>
                                        <td>{{$pedido->created_at }}</td>
                                        <td>{{$pedido->empresa->nombre}}</td>
                                        <td>{{$pedido->total}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="col-12">
                                <span>Comisiones Ganadas:</span>
                                {{-- <span id="delivery"></span>
                                <span id="totalpedidos"></span> --}}
                                <span id="totalganado"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {!! $pedidos->appends(request()->query() )->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let pedidos = $("#tbody_pedidos tr").length;
        $("#delivery").html('S/ 5.00');
        let total_comisiones = parseFloat( 5 * pedidos);
        $("#totalganado").html('S/ '+ total_comisiones );

        $("#distribuidor").on('change', function(){
            if ( $(this).val() == 'todos' ) {
                cargartabla("{{route('ajax.ajaxpedidosPorRepartidorTodos')}}" );
            } else {
                if ( $("#desde").val()=='' || $("#hasta").val()=='') {
                alertaError();
                $('#distribuidor').val($('#distribuidor > option:first').val());
            } else {
                if ( $("#desde").val() <  $("#hasta").val()) {
                    cargartabla('{{route("ajax.pedidosentregados.repartidor")}}');
                }else{
                     alertaError();
                     $('#distribuidor').val($('#distribuidor > option:first').val());
                }
            } 
            }
                     
        });

    function cargartabla(url){
        $("#tbody_pedidos").html('');
            $("#totalganado").html('');
            $.ajax({
                url:url,
                method:'get',
                dataType: 'json',
                data: { id :  $("#distribuidor").val(), desde : $("#desde").val(), hasta : $("#hasta").val() },
                success: function(data){
                  
                    let tdatos ="" 
                    $.each(data.data, function(index, user){
                        console.log(index);
                        tdatos =  tdatos + `<tr>
                                        <td>000-${user.id}</td>
                                        <td>${user.cliente.name}</td>
                                        <td>${user.created_at }</td>
                                        <td>${user.empresa.nombre}</td>
                                        <td>${user.total}</td>
                                    </tr> `
                    });
                    $("#tbody_pedidos").html( tdatos );

                let pedidos = $("#tbody_pedidos tr").length;
                             $("#delivery").html('S/ 5.00');
                let total_comisiones = parseFloat( 5 * pedidos);
                             $("#totalganado").html('S/ '+ total_comisiones );

                },
                error:function(){                   
                    alertaError();
                }
            })
}
        function alertaError(){
            const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 5000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: '¡Algo salio mal! revise que las fechas sean las correctas.'
                        })
        }

    })
</script>

@endsection

@else

@include('includes.sinpermiso')
@endcan
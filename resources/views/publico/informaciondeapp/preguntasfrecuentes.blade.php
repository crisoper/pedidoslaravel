@extends('layouts.public')

@section('contenido')
<style>
    .body_politicas{
        background: white;
        padding: 50px;;
    }
</style>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 d-flex justify-content-center">
            <p>
                <h5><strong>PREGUNTAS FRECUENTES</strong></h5>
            </p>
        </div>
        <div class="col-10  body_politicas">        
        <h6><strong>1. ¿Qué trabajo realiza {{config('app.name', 'PedidosApp')}}?</strong></h6>    
            <p>
                {{config('app.name', 'PedidosApp')}} es una aplicación web que esta dirigida a cualquier persona jurídica con negocio (a la cual llamaremos "Establecimiento") que desee vender por internet, y cualquier persona natural (a quien llamaremos "Consumidor") que desee realizar compras por internet.
            </p>
            <p>
                {{config('app.name', 'PedidosApp')}} se encargará de realizar el delivery de los diferentes pedidos que realice un consumidor.
            </p>
            <p>
                <strong>Un Establecimiento</strong> al registrarse contara con una pagina donde podrá registrar todos sus productos con sus respectivos precios, descripción y si es necesario podrá poner en oferta ese producto. Todos estos registros se verán reflejados en la página principal de la aplicación web.
            </p>
            <p>
                <strong>Un Consumidor</strong> al ingresar a la página web podrá visualizar diversos tipos de productos de los cuales podrá realizar pedidos de los productos que dese consumir. 
            </p>
            <p>
                En cada producto se visualizará a que establecimiento pertenece, registrandose asi el pedido por cada establecimiento.
            </p>
            <p>
                {{config('app.name', 'PedidosApp')}} registrará el pedido efectuado por el consumidor y realizara la compra en el establesimiento elegido, este pedido será resepcionado por un distribuidor de {{config('app.name', 'PedidosApp')}} quien comprará el producto del establecimiento elegido y entregará segun las especificaiones indicadas.
            </p>

           <h6><strong>¿Cómo realizo un pedido?</strong></h6>
           <p>
           Para realizar un pedido primero se tiene que crear una cuenta en {{config('app.name', 'PedidosApp')}} (puede crear su cuenta <a href="{{route('loginOrRegister', 'register')}}">aquí</a>). Una vez creada su cuenta podrá iniciar sesión y agregar al carrito el producto que desee adquirir.
           </p>
           <h6><strong>¿En que momento realizo el pago de mi pedido?</strong></h6>
           <p>
               El pago es contra entrega, usted realizará su pedido, {{config('app.name', 'PedidosApp')}} lo comprará por usted y lo llevara donde usted indique. Al recibir su producto cancelará el total de la compra mas la comicion por el delivery.
           </p>
           <h6><strong>¿Puedo cancelar un pedido?</strong></h6>
           <p>
               Una vez que uno de los distribuidores de {{config('app.name', 'PedidosApp')}} tome el pedido ya no podrá cancelar su pedido.
           </p>
           <h5><strong>¿Quienes pueden realizar un pedido?</strong></h5>
           <p>
               Solo se aceptaran pedidos de personas mayores de edad o menores de edad cuyo pedido sea confirmado por una persona adulta(padres o tutor).
           </p>


        </div>
    </div>
</div>


@endsection
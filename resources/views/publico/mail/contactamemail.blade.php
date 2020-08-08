<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>
    <p><strong> {{$usuario->nombre}} </strong> Esta enviando un mensaje desde contatanos</p>
    <p>
        <strong>Correo:</strong>{{ $usuario->email}} <br>

        <strong>Teléfono: </strong> {{$usuario->telefono}}
    </p>
    <p>
        <strong>Mensaje:</strong>{{ $usuario->mensaje}}
    </p>
    <hr>

    {{config('app.name', 'PedidosApp')}}

</body>

</html>













{{-- http://pedidoslaravel.test/confirmarcuenta?tokenactivar=asdasdasdasdasdasdasdasdasdasd --}}
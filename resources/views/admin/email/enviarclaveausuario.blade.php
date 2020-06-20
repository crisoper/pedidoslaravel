<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva clave de acceso</title>
</head>
<body>

    Etimad@:
    <br>
    {{ $usuario->name }}, el administrador de sitio {{ config('app.name', 'PedidosAPP') }}, ha generado una nueva clave de ingreso.

    <br><br>

    Su nueva clave de acceso es: {{ $clave }}

    <br>
    Para iniciar sesion con su nueva clave ingrese a: <a href="{{ route("login") }}" target="_blank">{{ route("login") }}</a>

</body>
</html>
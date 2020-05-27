
Hola {{ $usuario->name }}, has recibido este correo para activar tu cuenta:

<a href="{{ url('/') }}/activarcuentaempresa?tokenactivation={{ $usuario->remember_token }}">Activar cuenta</a>
<br><br>
{{ url('/') }}/activarcuentaempresa?tokenactivation={{ $usuario->remember_token }}

{{-- http://pedidoslaravel.test/confirmarcuenta?tokenactivar=asdasdasdasdasdasdasdasdasdasd --}}
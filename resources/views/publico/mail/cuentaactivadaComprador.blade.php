{{-- @extends('layouts.admin.admin') --}}
@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col ">
            <div class="card">
                <div class="card-header bg-info mb-0 pb-0 text-center">
                    <img src="{{asset('img/emailconfirmado.png')}}" alt="">
                </div>
                <div class="card-body text-center ">
                    <span class="display-4">¡Listo! </span>
                    <p class="card-text">
                    <h2>Has terminado, a partir de ahora podrás realizar tus pedidos en {{  config('app.name') }}. 
                    
                    </h2>                                                                                                                                   
                    </p>
                <a href="{{route('home')}}" class="btn btn-info"> Aceptar</a>
                      
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

    });
</script>
@endsection
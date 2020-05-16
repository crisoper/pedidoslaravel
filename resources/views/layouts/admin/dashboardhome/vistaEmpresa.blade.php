
<div class="col-12 mt-1">
    <div class="bg-dark bg-dark d-flex flex-row">
        
        @can('periodos.listar')
            <a href="{{route('periodos.index')}}" class="link  d-flex flex-wrap  text-center"><h3><i class="fas fa-calendar-check text-light m-2"></i></h3>  Periodos </a>
        @endcan
        @can('userperiodos.listar')    
            <a href="{{route('usuariosxperiodo.index')}}" class="link d-flex flex-wrap  text-center"><h3><i class="fas fa-user-check text-light m-2"></i></h3>  Usuarios por periodo</a>
        @endcan    
        @can('userempresas.listar')    
            <a href="{{route('usuariosxempresa.index')}}" class="link  d-flex flex-wrap text-center"> <h3> <i class="fas fa-poll-h text-light m-2"></i></h3>  Usuarios por empresa</a>
        @endcan
        
    </div>
</div>
  
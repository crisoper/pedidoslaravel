<aside class="main-sidebar sidebar-dark-primary elevation-0">
    <!-- Brand Logo -->
    <a href="{{ route("home") }}" class="brand-link">
        <img src="{{ asset('adminlte301/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Encuestas')  }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        
        <nav class="mt-2">
            <ul  class="nav nav-pills nav-sidebar siderbar-custom flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($_allMenus as $menu)
                    @if ( $_permisosUsuarioActual->contains( $menu->url ) )
                        <li class="nav-item has-treeview menu-opena">
                            @if ( Route::has( $menu->url ) )
                                <a href="{{ route($menu->url) }}" class="nav-link">
                                    <p>{!! $menu->icono !!} {!! $menu->nombre !!} </p>
                                </a>
                                
                                @if ($menu->submenus  and count( $menu->submenus ) > 0  )    
                                    <ul class="nav nav-treeview siderbar-custom">
                                        @foreach ( $menu->submenus as $submenu )
                                            @include('layouts.admin.submenusiderbar', ['submenu' => $submenu])
                                        @endforeach
                                    </ul>
                                @endif 
                            
                            @else 
                                <a href="#" class="nav-link">
                                    {!! $menu->icono !!} 
                                    <p>
                                        {{ $menu->nombre }} <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                
                                @if ($menu->submenus and count( $menu->submenus ) > 0 )    
                                    <ul class="nav nav-treeview siderbar-custom">
                                        @foreach ( $menu->submenus as $submenu )
                                            @include('layouts.admin.submenusiderbar', ['submenu' => $submenu])
                                        @endforeach
                                    </ul>
                                @endif

                            @endif
                            
                        </li>
                    @endif
                @endforeach
                
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>
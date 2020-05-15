@if ( $_permisosUsuarioActual->contains( $submenu->url ) )
    @if ( Route::has( $submenu->url ) )
        <li class="nav-item">
            <a href="{{ route($submenu->url) }}" class="nav-link">
                <p>{!! $submenu->icono !!} {!! $submenu->nombre !!}</p>
            </a> 
            
            @if ( $submenu->submenus and count( $submenu->submenus ) > 0 )
                <ul class="nav nav-treeview siderbar-custom">
                    @foreach ( $submenu->submenus as $submenu )
                        @include('layouts.admin.submenusiderbar', ['submenu' => $submenu])
                    @endforeach
                </ul>
            @endif

        </li>
    @else
        <li class="nav-item">
            <a href="#" class="nav-link">
                {!! $submenu->icono !!}<p>{{ $submenu->nombre }}<i class="right fas fa-angle-left"></i></p>
            </a>
            
            @if ( $submenu->submenus and count( $submenu->submenus ) > 0 ) 
                <ul class="nav nav-treeview siderbar-custom">
                    @foreach ( $submenu->submenus as $submenu )
                        @include('layouts.admin.submenusiderbar', ['submenu' => $submenu])
                    @endforeach
                </ul>
            @endif

        </li>
    @endif                                        
@endif  

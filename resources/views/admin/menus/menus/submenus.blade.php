<tr>
    {{-- <td>$loop->iteration + $menus->perPage() * ($menus->currentPage() - 1)</td> --}}
    {{-- <td>{{ $submenu->sistema ? $submenu->sistema->nombre : '' }}</td> --}}
    <td> 
        {!! $submenu->menupadre ? $submenu->menupadre->icono : '' !!}  {{ $submenu->menupadre ?  $submenu->menupadre->nombre : '' }}
    </td>
    <td>
        {!! $submenu->icono !!} {{ $submenu->nombre }}
    </td>
    <td>
        <span class="badge badge-infoa right">{{ $submenu->orden }}</span>
    </td>

    @if ( Route::has( $submenu->url ) ) 
        <td>  
            {{ $submenu->url }} 
        </td>
        <td class="text-center">
            <a class="text-info" href="{{ route($submenu->url) }}" target="_blank"><i class="fas fa-link"></i></a>  
        </td>
    @else
        <td>  
            {{ $submenu->url }} 
        </td>
        <td> 
        </td>
    @endif

    <td class="text-center">
        @can('public.menus.editar')
            <a href="{{ route('menus.edit', $submenu->id) }}"><i class="fas fa-edit"></i></a>
        @endcan
    </td>
    <td class="text-center">
        @can('public.menus.eliminar')
            <form id="form.menus.delete.{{$submenu->id}}" action="{{ route('menus.destroy', $submenu->id) }}" method="POST">
                {!! method_field('DELETE') !!}
                {!! csrf_field() !!}
                <a 
                class="text-danger menus" 
                href="#"
                onclick="event.preventDefault(); document.getElementById('form.menus.delete.{{$submenu->id}}').submit();"
                >
                {{-- <i class="far fa-minus-square"></i> --}}
                    <i class="fas fa-trash-alt"></i>
                </a>
            </form>
        @endcan
    </td>                                        
</tr>

@if ($submenu->menus)
    @foreach ($submenu->menus as $submenu)
        @include('admin.menus.menus.submenus', ['submenu' => $submenu])
    @endforeach
@endif
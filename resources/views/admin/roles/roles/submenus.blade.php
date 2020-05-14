<li>
    <div class="form-group form-check mb-0 pb-0">
        <input 
            type="checkbox" 
            class="form-check-input" 
            name="menus[]" 
            value="{{ $submenu->url }}" 
            id="{{ $submenu->url."-".$submenu->id }}"
            @if ( $rol->hasPermissionTo($submenu->url, 'menu') )
                checked="checked"
            @endif
        >
        <label class="form-check-label" for="{{ $submenu->url."-".$submenu->id }}" >{{ $submenu->nombre }}</label>
    </div>
</li>

@if ( $submenu->submenus )
    <ul style="list-style:none;">
        @foreach ( $submenu->submenus as $submenu )
        @include('roles.submenu', ['submenu' => $submenu])
        @endforeach
    </ul>
@endif
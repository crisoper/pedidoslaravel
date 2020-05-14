<?php

namespace App\Models\Admin\Menus;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    public function menus()
    {
        return $this->hasMany('App\Models\Admin\Menus\Menu', 'parent_id');
    }

    public function menupadre()
    {
        return $this->belongsTo('App\Models\Admin\Menus\Menu', 'parent_id');
    }

    public function submenus()
    {
        return $this->hasMany('App\Models\Admin\Menus\Menu', 'parent_id')->with('menus')->orderBy('orden', 'asc');
    }

}

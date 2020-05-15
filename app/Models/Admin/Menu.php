<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menus()
    {
        return $this->hasMany('App\Models\Admin\Menu', 'parent_id');
    }

    public function menupadre()
    {
        return $this->belongsTo('App\Models\Admin\Menu', 'parent_id');
    }

    public function submenus()
    {
        return $this->hasMany('App\Models\Admin\Menu', 'parent_id')->with('menus')->orderBy('orden', 'asc');
    }
}

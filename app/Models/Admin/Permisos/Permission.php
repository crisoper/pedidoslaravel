<?php

namespace App\Models\Admin\Permisos;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'guard_name'];
}

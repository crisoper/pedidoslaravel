<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Modelhasrole extends Model
{
    protected $table = 'model_has_roles';
    public $timestamps = false;
    
    protected $fillable=[
        'role_id',
        'model_type',
        'model_id'
    ];
}

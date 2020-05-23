<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Userempresa extends Model
{
    protected $table='userempresas';
    protected $fillable = 
        [
            'user_id',
            'empresa_id',
            'estado',
            
        ];

}

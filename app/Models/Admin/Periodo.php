<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodo extends Model
{
    protected $table ='periodos';

    use SoftDeletes;

    protected $dates =['deleted_at'];

    /*
    * Relacion muchos a muchos con periodos
    */
    public function usuarios(){
        return $this->belongsToMany('\App\User','userperiodos', "periodo_id", "user_id")->withTimestamps();
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa', 'empresa_id');
    }
}

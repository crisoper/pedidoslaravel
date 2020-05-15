<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    
    protected $table = 'empresas';
    use SoftDeletes;
    protected $dates =['deleted_at'];


    /*
    * Rubro al que pertenece la empresa
    */
    public function rubro()
    {
        return $this->belongsTo('App\Models\Admin\Empresarubro', '', 'rubro_id');
    }


    /*
    * Relacion muchos a muchos con usuarios
    */
    public function usuarios(){
        return $this->belongsToMany('\App\User','userempresas', "empresa_id", "user_id")
        ->withPivot('estado')
        ->withTimestamps()
        ->wherePivot('estado', 1);
    }


    /*
    * Usuario que ha creado el registro
    */
    public function creador()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
    
    /*
    * Usuario que ha modificado el registro
    */
    public function actualizador()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

}

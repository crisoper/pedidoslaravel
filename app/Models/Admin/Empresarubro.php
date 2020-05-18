<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresarubro extends Model
{
    
    protected $table = 'empresarubros';
    use SoftDeletes;
    protected $dates =['deleted_at'];


    /*
    * Empresas del rubro
    */
    public function empresas()
    {
        return $this->hasMany('App\Models\Admin\Empresa', 'rubro_id');
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

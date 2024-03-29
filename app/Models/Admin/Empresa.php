<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    
    protected $table = 'empresas';
    use SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable=[
        "rubro_id",
        "ruc",
        "nombre",
        "direccion",
        "paginaweb",
        'logo' ,
        "provinciaid" ,
        "departamentoid" ,
        "distritoid",
        "telefono" ,     
        'name_representante',
        'paterno' ,
        'materno' ,
        'email',
        'password' ,
        'created_by',
    ];


    /*
    * Rubro al que pertenece la empresa
    */
    public function rubro()
    {
        return $this->belongsTo('App\Models\Admin\Empresarubro', 'rubro_id', 'id');
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

    public function periodo(){
        return $this->hasMany('App\Models\Encuestas\Administracion\Periodos', 'empresa_id','id');
    }

    public function horarios()
    {
        return $this->hasMany('App\Models\Publico\Horario', 'empresa_id', 'id');
    }


    //Relacion muchos a muchos con comprobante tipos 
    public function comprobantetipos()
    {
        return $this->belongsToMany('\App\Models\Admin\Comprobantetipo', 'empresacomprabantetipos', 'comprobantetipo_id', 'empresa_id');
    }

    public function departamento(){
        return $this->hasOne('App\Models\Publico\Departamento');
    }


    /*
    * Usuario que ha creado el registro
    */
    public function creador()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
    public function persona()
    {
        return $this->belongsTo('App\Models\Publico\Persona');
    }

    public function productos(){
        return $this->hasMany('App\Models\Admin\Producto', 'empresa_id', 'id');
    }
    
    /*
    * Usuario que ha modificado el registro
    */
    public function actualizador()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }



    

    /*
    * Distrito al que pertenece la empresa
    */
    public function distrito()
    {
        return $this->belongsTo('App\Models\Publico\Distrito', 'distrito_id', 'id');
    }
    /*
    * Provincia al que pertenece la empresa
    */
    public function provincia()
    {
        return $this->belongsTo('App\Models\Publico\Provincia', 'provincia_id', 'id');
    }
    /*
    * Departamento al que pertenece la empresa
    */
    public function departamentoid()
    {
        return $this->belongsTo('App\Models\Publico\Departamento', 'departamento_id', 'id');
    }
}

<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable=[
        'nombre',
        'paterno',
        'materno',
        'dni',
        'direccion',
        'telefono',
        'correo',
        'created_by'
    ];

    public function empresas(){
        return $this->hasmay('App\Models\Admin\Empresa', 'presona_id', 'id');
    }
    
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprobantetipo extends Model
{
    protected $table = 'comprobantetipos';

    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'nombre',
        'descripcion',
        'created_by',
    ];

    
    public function empresas(){
        return $this->belongsToMany('App\Models\Admin\Empresa','empresacomprabantetipos', 'comprabantetipo_id', 'empresa_id')
                    ->withTimestamps();
    }
}

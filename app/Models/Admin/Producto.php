<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'categoria_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'created_by',
    ];

    public function fotos()
    {
      return  $this->hasMany('App\Models\Admin\Productofoto','producto_id','id');
    }
    
}

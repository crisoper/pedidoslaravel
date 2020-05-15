<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productocategoria extends Model
{
    protected $table = 'productocategorias';
    use  SoftDeletes;
    protected $dates =['deleted_at'];

    protected $fillable =[
        'empresa_id',
        'nombre',
        'parent_id',
        'created_by',
    ];
}

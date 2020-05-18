<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Empresacomprobantetipos extends Model
{
    protected $table = 'empresacomprabantetipos';

    protected $fillable = [
        'comprabantetipo_id',
        'empresa_id',
        'created_by',
        'updated_by',
    ];

}

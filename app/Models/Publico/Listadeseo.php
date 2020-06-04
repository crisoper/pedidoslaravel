<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listadeseo extends Model
{
    protected $table = 'listadeseos';
    use SoftDeletes;
    protected $dates =['deleted_at'];

    public function producto()
    {
        return $this->belongsTo('App\Models\Admin\Producto', 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\User', 'cliente_id');
    }
}

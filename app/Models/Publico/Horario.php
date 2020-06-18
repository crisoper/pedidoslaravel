<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Horario extends Model
{
    use  SoftDeletes;
    

    public function empresa()
    {
        return $this->belongsTo('App\Models\Admin\Empresa', 'empresa_id', 'id');
    }

}

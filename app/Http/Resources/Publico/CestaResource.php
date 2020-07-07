<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class CestaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'producto' => new ProductoResource( $this->producto ),
            'empresa' => new EmpresaResource( $this->empresa ),
            'cantidad' => $this->cantidad,
            'tipo' => $this->tipo,
            'fecha' => $this->created_at != null ? date("d/m/Y", strtotime($this->created_at) ) : '',
        ];
    }
}

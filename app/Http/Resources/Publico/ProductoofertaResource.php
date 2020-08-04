<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoofertaResource extends JsonResource
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
            'empresa_id' => $this->empresa_id,
            'producto_id' => $this->producto_id,
            'preciooferta' => $this->preciooferta,
            'diainicio' => $this->diainicio,
            'horainicio' => $this->horainicio,
            'diafin' => $this->diafin,
            'horafin' => $this->horafin,
        ];
    }
}

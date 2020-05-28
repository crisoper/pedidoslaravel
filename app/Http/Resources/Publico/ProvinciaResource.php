<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'departamento_id' => $this->departamento_id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
        ];
    }
}

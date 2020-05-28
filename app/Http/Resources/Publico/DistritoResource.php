<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class DistritoResource extends JsonResource
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
            'provincia_id' => $this->provincia_id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
        ];
        // return parent::toArray($request);
    }
}

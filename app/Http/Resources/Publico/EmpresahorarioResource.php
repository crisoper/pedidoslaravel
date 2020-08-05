<?php

namespace App\Http\Resources\Publico;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresahorarioResource extends JsonResource
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
            'dia' => $this->dia,
            'horainicio' => $this->horainicio,
            'horafin' => $this->horafin,
        ];
    }
}

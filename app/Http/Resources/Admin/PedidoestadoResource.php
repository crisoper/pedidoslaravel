<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoestadoResource extends JsonResource
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
            'estado' => $this->estado,
            'created_by' => $this->created_by,

            'pedido_id' => $this->pedido ? $this->pedido->id : 0,
        ];
    }
}

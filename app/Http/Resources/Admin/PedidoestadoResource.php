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
            'calificacion' => $this->calificacion,
            'created_at' => $this->created_at->format('d/m/Y - h:i A'),

            // 'created_by' => $this->created_by,
            'repartidor_id' => $this->repartidor ? $this->repartidor->id : 0,
            'repartidor' => $this->repartidor ? $this->repartidor->name : 0,

            'pedido_id' => $this->pedido ? $this->pedido->id : 0,
        ];
    }
}

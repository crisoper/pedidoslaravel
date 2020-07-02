<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
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
            'total' => $this->total,
            'created_at' => $this->created_at->format('d/m/Y - h:i A'),
            
            'cliente_id' => $this->cliente ? $this->cliente->id : 0, 
            'cliente' => $this->cliente ? $this->cliente->name : '',
        ];
    }
}

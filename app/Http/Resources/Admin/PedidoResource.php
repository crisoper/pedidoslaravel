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
            
            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',


            'detalle' => $this->pedidodetalle ? PedidodetalleResource::collection($this->pedidodetalle) : [],
            'estado' => $this->pedidoestado ? PedidoestadoResource::collection($this->pedidoestado) : [],
        ];
    }
}

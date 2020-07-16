<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidodetalleResource extends JsonResource
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
            'preciounitario' => $this->preciounitario,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->subtotal,
            
            'producto_id' => $this->producto ? $this->producto->id : 0, 
            'producto' => $this->producto ? $this->producto->nombre : '',
            
            'pedido_id' => $this->pedido ? $this->pedido->id : 0,
            
            'empresa_id' => $this->empresa ? $this->empresa->id : 0, 
            'empresa' => $this->empresa ? $this->empresa->nombre : '',
            'empresa_direccion' => $this->empresa ? $this->empresa->direccion : '',
        ];
    }
}

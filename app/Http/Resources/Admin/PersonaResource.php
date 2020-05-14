<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
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
            'tipodocumento' => $this->tipo_doc_identidad,
            'nrodocumento' => $this->doc_identidad,
            'nombres' => $this->nombres,
            'paterno' => $this->paterno,
            'materno' => $this->materno,
            'sexo' => $this->sexo,
            'celular' => $this->celular,
            'fechanacimiento' => date("Y-m-d", strtotime( $this->fechanacimiento ) ),
            'direccion' => $this->direccion,
            'departamento' => $this->departamento_id,
            'provincia' => $this->provincia_id,
            'distrito' => $this->distrito_id,
            'comunidad' => $this->comunidad_id,
            'sector' => $this->sector_id,
        ];

    }
}

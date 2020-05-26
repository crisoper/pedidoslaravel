<?php

namespace App\Http\Requests\Publico;

use Illuminate\Foundation\Http\FormRequest;

class CreatuempresaCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "rubro_id" => ["required"],
            "ruc" => ["required", 'max:11', 'unique:empresas,ruc,'.request()->get("ruc")],
            "nombre" => ["required"],
            "direccion" => ["required"],
            "facebook" => ["nullable"],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            "nombrecomercial" => ["required"],
            "departamentoid" => ["required"],
            "provinciaid" => ["required"],
            "distritoid" => ["required"],

            "nombre" => ["required"],
            "paterno" => ["required"],
            "materno" => ["required"],
            "dni" => ["required"],
            "telefono" => ["required"],
            "correo" => ["required"],

      
        ];

    }
    public function messages()
    {
        return [
            'ruc.required' => 'El número de ruc ya esta en uso.',
              
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Empresas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class EmpresaCreateRequest extends FormRequest
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
            "paginaweb" => ["nullable"],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            "provinciaid" => ["required"],
            "departamentoid" => ["required"],
            "distritoid" => ["required"],
            "telefono" => ["required"],
         
            'name_representante' => ['required', 'string', 'max:255'],
            'paterno' => ['required', 'string', 'max:255'],
            'materno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.request()->get('email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

    }
    public function messages()
    {
        return [
            'ruc.required' => 'El número de ruc ya esta en uso.',
              
        ];
    }
}

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
            "nombreempresa" => ["required"],
            "direccion" => ["required"],
            'dni_representante' => ['required','unique:personas,dni'],           
            "telefono" => ["required"],
         
            'name_representante' => ['required', 'string', 'max:255'],
            'paterno' => ['required', 'string', 'max:255'],
            'materno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.request()->get('email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

    }
    // public function messages()
    // {
    //     return [
    //         'ruc.required' => 'El número de ruc ya se encuentra en uso.',
              
    //     ];
    // }
}

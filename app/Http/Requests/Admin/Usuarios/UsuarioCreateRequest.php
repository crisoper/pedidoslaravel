<?php

namespace App\Http\Requests\Admin\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('users.crear');
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required'],
            'paterno' => ['required'],
            'materno' => ['required'],
            'dni' => ['required','unique:personas,dni'],
            'telefono' => ['required' ],
            'direccion' => ['required'],
            'email' => ['required','unique:users,email'],
            'password' => 'required|confirmed',
        ];
        
    }
}

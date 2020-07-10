<?php

namespace App\Http\Requests\Admin\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('users.editar');
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
            'dni' => ['required','numeric', 'digits:8', 'unique:personas,dni,'.$this->personaid],
            'telefono' => ['required' , 'digits:9' ],
            'email' => ['required','unique:users,email,'.$this->route('usuario')],
            'password' => 'confirmed',

                        
        ];
    }
}

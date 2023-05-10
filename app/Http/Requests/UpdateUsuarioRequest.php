<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' =>  ['required', 'min:5', 'max:40', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
            'usuario' => 'required|min:5|max:40|unique:clientes|unique:gerentes',
            'nacimiento' => 'required|date|before:today',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'El campo nombre debe tener un minimo de :min caracteres',
            'nombre.max' => 'El campo nombre solo puede tener un maximo de :max caracteres',
            'nombre.regex' => 'El campo nombre solo puede contener letras.',

            'usuario.required' => 'El campo usuario es requerido',
            'usuario.min' => 'El campo usuario debe tener un minimo de :min caracteres',
            'usuario.max' => 'El campo usuario solo puede tener un maximo de :max caracteres',  

            'nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'nacimiento.before' => 'El campo fecha de nacimiento debe ser anterior a la fecha actual.',
            
        ];
    }
}

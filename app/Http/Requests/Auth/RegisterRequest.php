<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string','min:8','confirmed']
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required'         => 'El nombre es obligatorio.',
            'name.max'              => 'El nombre no puede superar 255 caracteres.',
            'email.required'        => 'El email es obligatorio.',
            'email.email'           => 'El email no es válido.',
            'email.unique'          => 'Este email ya está registrado.',
            'password.required'     => 'El password es obligatorio.',
            'password.min'          => 'El password debe tener al menos 8 caracteres.',
            // confirmed valida que exista password_confirmation igual al password
            'password.confirmed'    => 'Los passwords no coinciden.',
        ];
    }
}

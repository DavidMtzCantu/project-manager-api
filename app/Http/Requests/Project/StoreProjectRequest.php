<?php
declare(strict_types=1);
namespace App\Http\Requests\Project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'description' => ['nullable','string'],
            'status' => ['nullable','in:pending,in_progress,completed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "El nombre del proyecto es obligatorio",
            'name.max' => "El nombre tiene un maximo de 255 caracteres",
            'status.in' => "El estado debe ser pending, in progress o completed.",
        ];
    }
}

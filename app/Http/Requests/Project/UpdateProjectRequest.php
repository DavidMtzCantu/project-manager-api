<?php
declare(strict_types=1);
namespace App\Http\Requests\Project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            // sometimes — solo valida si el campo está presente en el request
            'name'        => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'status'      => ['sometimes', 'in:pending,in_progress,completed'],
        ];
    }

     public function messages(): array
    {
        return [
            'name.max'   => 'El nombre no puede superar 255 caracteres',
            'status.in'  => 'El estado debe ser pending, in progress o completed',
        ];
    }
}

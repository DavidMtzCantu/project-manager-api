<?php
declare(strict_types=1);
namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'status' => ['nullable','in:pending,in_progress,completed'],
            'due_date' => ['nullable','date','after_or_equal:today'],
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'El título de la tarea es obligatorio',
            'title.max' => 'El título no puede superar 255 caracteres',
            'status.in' => 'El status debe ser pending, in progress o completed',
            'due_date.date' => 'La fecha de vencimiento no es válida',
            'due_date.after_or_equal' => 'La fecha de vencimiento debe ser hoy o una fecha futura',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // permite que qualquer usuário autenticado faça a requisição.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Regras de validação.
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Validação de status para o método de update
            'status' => 'sometimes|required|string|in:pendente,concluída',
        ];
    }
}
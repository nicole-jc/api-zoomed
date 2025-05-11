<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array // Regras de validação para cada campo
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'frequency' => 'required|string|max:7'
        ];
    }

    public function messages(): array // Mensagens em resposta as validações
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'name.string' => 'Nome precisa ser composto por letras!',
            'name.max' => 'Nome não pode conter mais de 255 caractéres!',
            'description.required' => 'Descrição é obrigatória!',
            'description.string' => 'Descrição precisa ser composta por letras!',
            'description.max' => 'Descrição não pode conter mais de 255 caractéres!',
            'frequency.required' => 'Frequência é obrigatória!',
            'frequency.string' => 'Campo Frequência é inválido!',
            'frequency.max' => 'Frequência não pode conter mais de 7 caractéres!'
        ];
    }
}

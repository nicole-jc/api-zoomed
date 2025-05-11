<?php

namespace App\Http\Requests;

use App\Models\Specie;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            'birthdate' => 'required',
            'class_id' => 'required|integer',
            'specie_id' => 'required|integer',
            'habitat' => 'required|string|max:60',
            'country' => 'required|string|max:60'
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
            'birthdate.required' => 'Data de aniversário é obrigatória!',
            'class_id.integer' => 'Conteúdo no campo Classe é inválido!',
            'class_id.size' => 'Conteúdo no campo Classe é inválido!',
            'specie_id.required' => 'Campo Espécie é obrigatório!',
            'specie_id.integer' => 'Conteúdo no campo Espécie é invalido!',
            'habitat.required' => 'Habitat é obrigatório',
            'habitat.string' => 'Habitat precisa ser composto por letras!',
            'habitat.max' => 'Habitat não pode conter mais de 60 caractéres!',
            'country.required' => 'País de Origem é obrigatório!',
            'country.string' => 'País de Origem precisa ser composto por letras!',
            'country.max' => 'País de Origem não pode conter mais de 60 caractéres!'
        ];

    }
}

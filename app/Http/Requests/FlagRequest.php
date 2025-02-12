<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlagRequest extends FormRequest
{
    /**
     * Regras de validação aplicadas ao request.
     */
    public function rules(): array
    {
        $flagsId = $this->route('flags');

        return [
            'name' => "required|string|max:255|unique:flags,name,{$flagsId}",
            'economic_group_id' => 'required|exists:economic_groups,id',
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome da bandeira é obrigatório.',
            'name.unique' => 'Essa bandeira já existe.',
            'economic_group_id.required' => 'O grupo econômico é obrigatório.',
            'economic_group_id.exists' => 'O grupo econômico selecionado não existe.',
        ];
    }
}

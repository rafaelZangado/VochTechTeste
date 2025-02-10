<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    /**
     * Regras de validação aplicadas ao request.
     */
    public function rules(): array
    {
        $unitId = $this->route('unit');
        return [
            'trade_name' => "required|string|max:255|unique:units,trade_name,{$unitId},id",
            'corporate_name' => "required|string|max:255|unique:units,corporate_name,{$unitId},id",
            'cnpj' => "required|string|max:18|unique:units,cnpj,{$unitId},id",
            'flag_id' => 'required|exists:flags,id'
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     */
    public function messages(): array
    {
        return [
            'trade_name.required' => 'O nome fantasia é obrigatório.',
            'trade_name.unique' => 'Este nome fantasia já está em uso.',
            'corporate_name.required' => 'A razão social é obrigatória.',
            'corporate_name.unique' => 'Esta razão social já está cadastrada.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'flag_id.required' => 'A bandeira é obrigatória.',
            'flag_id.exists' => 'A bandeira selecionada não existe.',
        ];
    }
}

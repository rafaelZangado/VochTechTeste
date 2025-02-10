<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee');

        return [
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:employees,email,{$employeeId},id",
            'cpf' => "required|string|size:14|unique:employees,cpf,{$employeeId},id",
            'position' => 'nullable|string|max:100',
            'unit_id' => 'required|exists:economic_groups,id'

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter exatamente 14 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }
}

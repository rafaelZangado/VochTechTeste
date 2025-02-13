@extends('components.blanck')
@section('title', 'Editar Grupo Econômico')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-3">
        Funcionarios / <b>Editar</b>
    </h1>
    <a href="{{ route('employees.index', $dados->id) }}" class="btn btn-danger">
        <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formEditeComponente', [
    'action' => route('employees.update', $dados->id),
    'method' => 'POST',
    'campos' => [
        [
            'name' => 'name',
            'label' => 'Nome Completo',
            'type' => 'text',
            'placeholder' => 'Nome completo',
            'value' => old('name', $dados->name),
            'required' => true
        ],
        [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
            'placeholder' => 'email@exemplo.com.br',
            'value' => old('email', $dados->email),
            'required' => true
        ],
        [
            'name' => 'cpf',
            'label' => 'C.P.F',
            'type' => 'text',
            'placeholder' => '000.000.000-00',
            'value' => old('cpf', $dados->cpf),
            'required' => true
        ],
        [
            'name' => 'unit_id',
            'label' => 'Unidade / Nome Fantasia',
            'type' => 'select',
            'options' => $units->map(fn($unit) => [
                'id' => $unit->id,
                'name' => $unit->trade_name .' / '. $unit->corporate_name
            ])->toArray(),
            'value' => old('unit_id', $dados->unit_id),
            'required' => true
        ],
    ],

    'botao' => 'Salvar Alterações'
])
@endsection

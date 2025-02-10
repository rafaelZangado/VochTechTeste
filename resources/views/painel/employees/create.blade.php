@extends('components.blanck')
@section('title', 'Cadastrar Funcionario')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="display-5 mb-3">
    Funcionarios/ <b>Cadastrar Funcionario</b>
</h1>
    <a href="{{route('employees.index')}}" class="btn btn-success">
    <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formComponente', [
        'action' => route('employees.store'),
        'method' => 'POST',
        'campos' => [
            [
                'name' => 'name',
                'label' => 'Nome Completo',
                'type' => 'text',
                'placeholder' => 'Nome completo',
                'required' => true
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text',
                'placeholder' => 'email@exemplo.com.br',
                'required' => true
            ],
            [
                'name' => 'cpf',
                'label' => 'C.P.F',
                'type' => 'text',
                'placeholder' => '000.000.000-00',
                'required' => true
            ],
            [
                'name' => 'unit_id',
                'label' => 'Unidade / Nome Fantasia',
                'type' => 'select',
                'options' => $unit->map(fn($group) => [
                    'id' => $group->id,
                    'name' => $group->trade_name .' / '. $group->corporate_name])->toArray(),
                'required' => true
            ],
        ],
        'botao' => 'Salvar Registro'
    ])
@endsection

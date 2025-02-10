@extends('components.blanck')
@section('title', 'Criar nova unidade')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="display-5 mb-3">
    Unidades/ <b>Cadastrar Unidade</b>
</h1>
    <a href="{{route('units.index')}}" class="btn btn-success">
    <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formComponente', [
        'action' => route('units.store'),
        'method' => 'POST',
        'campos' => [
            [
                'name' => 'trade_name',
                'label' => 'Nome Fantasia',
                'type' => 'text',
                'placeholder' => 'Digite o nome Fantasia',
                'required' => true
            ],
            [
                'name' => 'corporate_name',
                'label' => 'Razão social',
                'type' => 'text',
                'placeholder' => 'Digite o nome da Razão social',
                'required' => true
            ],
            [
                'name' => 'cnpj',
                'label' => 'CNPJ',
                'type' => 'text',
                'placeholder' => 'Digite o cnpj',
                'required' => true
            ],
            [
                'name' => 'flag_id',
                'label' => 'Bandeiras',
                'type' => 'select',
                'options' => $flags->map(fn($group) => [
                    'id' => $group->id,
                    'name' => $group->name])->toArray(),
                'required' => true
            ],


        ],
        'botao' => 'Criar Grupo'
    ])
@endsection

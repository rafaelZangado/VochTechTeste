@extends('components.blanck')
@section('title', 'Editar Unidade')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-3">
        Unidades / <b>Editar</b>
    </h1>
    <a href="{{ route('units.index', $dados->id) }}" class="btn btn-danger">
        <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formEditeComponente', [
    'action' => route('units.update', $dados->id),
    'method' => 'POST',
    'campos' => [
        [
            'name' => 'trade_name',
            'label' => 'Nome Fantasia',
            'type' => 'text',
            'placeholder' => 'Digite o nome Fantasia',
            'value' => old('trade_name', $dados->trade_name),
            'required' => true
        ],
        [
            'name' => 'corporate_name',
            'label' => 'Razão Social',
            'type' => 'text',
            'placeholder' => 'Digite a Razão Social',
            'value' => old('corporate_name', $dados->corporate_name),
            'required' => true
        ],
        [
            'name' => 'cnpj',
            'label' => 'CNPJ',
            'type' => 'text',
            'placeholder' => 'Digite o CNPJ',
            'value' => old('cnpj', $dados->cnpj),
            'required' => true
        ],
        [
            'name' => 'flag_id',
            'label' => 'Bandeira',
            'type' => 'select',
            'options' => $flags->map(fn($flag) => [
                'id' => $flag->id,
                'name' => $flag->name
            ])->toArray(),
            'selected' => old('flag_id', $dados->flag_id),
            'required' => true
        ],
    ],

    'botao' => 'Salvar Alterações'
])
@endsection

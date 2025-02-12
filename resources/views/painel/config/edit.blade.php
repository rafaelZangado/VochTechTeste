@extends('components.blanck')
@section('title', 'Editar Unidade')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-3">
        Gerente / <b>Editar</b>
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
            'name' => 'name',
            'label' => 'Nome Fantasia',
            'type' => 'text',
            'placeholder' => 'Digite o nome Fantasia',
            'value' => old('trade_name', $dados->trade_name),
            'required' => true
        ],
        [
            'name' => 'password',
            'label' => 'Senha',
            'type' => 'text',
            'placeholder' => 'Digite sua nova senha',
            'value' => old('corporate_name', $dados->corporate_name),
            'required' => true
        ],
    ],

    'botao' => 'Salvar Alterações'
])
@endsection

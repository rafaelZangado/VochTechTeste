@extends('components.blanck')
@section('title', 'Editar Grupo Econômico')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-3">
        Bamdeiras / <b>Editar {{$dados->id}}</b>
    </h1>
    <a href="{{ route('flags.index', $dados->id) }}" class="btn btn-danger">
        <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formEditeComponente', [
        'action' => route('flags.update', $dados->id),
        'method' => 'PUT',
        'campos' => [
            [
                'name' => 'name',
                'label' => 'Nome da Bandeira',
                'type' => 'text',
                'placeholder' => 'Digite o nome da bandeira',
                'value' => old('name', $dados->name),
                'required' => true
            ],
            [
                'name' => 'economic_group_id',
                'label' => 'Grupo Econômico',
                'type' => 'select',
                'options' => $economicGroups,
                'selected' => old('economic_group_id', $dados->economic_group_id),
                'required' => true
            ]
        ],
        'botao' => 'Salvar Alterações'
    ])
@endsection

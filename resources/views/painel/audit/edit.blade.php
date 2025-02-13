@extends('components.blanck')
@section('title', 'Editar Grupo Econômico')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-3">
        Grupos Econômicos / <b>Editar</b>
    </h1>
    <a href="{{ route('groups.index', $group->id) }}" class="btn btn-danger">
        <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formEditeComponente', [
    'action' => route('groups.update', $group->id),
    'method' => 'POST',
    'campos' => [
        [
            'name' => 'name',
            'label' => 'Nome do Grupo',
            'type' => 'text',
            'placeholder' => 'Digite o nome do grupo',
            'value' => old('name', $group->name),
            'required' => true
        ],
    ],
    'botao' => 'Salvar Alterações'
])
@endsection

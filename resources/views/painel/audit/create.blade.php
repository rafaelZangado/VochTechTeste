@extends('components.blanck')
@section('title', 'Criar novo Grupo Economico')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="display-5 mb-3">
    Grupos Economicos/ <b>Cadastrar Grupo</b>
</h1>
    <a href="{{route('groups.index')}}" class="btn btn-success">
    <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formComponente', [
        'action' => route('groups.store'),
        'method' => 'POST',
        'campos' => [
            [
                'name' => 'name',
                'label' => 'Nome do Grupo',
                'type' => 'text',
                'placeholder' => 'Digite o nome do grupo',
                'required' => true
            ],
        ],
        'botao' => 'Criar Grupo'
    ])
@endsection

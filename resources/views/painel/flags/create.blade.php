@extends('components.blanck')
@section('title', 'Criar nova bandeira')
@section('tela')

<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="display-5 mb-3">
    Bandeiras/ <b>Cadastrar Bandeiras</b>
</h1>
    <a href="{{route('flags.index')}}" class="btn btn-success">
    <i class="bi bi-arrow-return-left"></i> Voltar
    </a>
</div>

@include('components.formComponente', [
        'action' => route('flags.store'),
        'method' => 'POST',
        'campos' => [
            [
                'name' => 'name',
                'label' => 'Bandeira',
                'type' => 'text',
                'placeholder' => 'Digite o nome da bandeira',
                'required' => true
            ],
            [
                'name' => 'economic_group_id',
                'label' => 'Nome do Grupo',
                'type' => 'select',
                'options' => $economicGroups->map(fn($group) => [
                    'id' => $group->id,
                    'name' => $group->name])->toArray(),
                'required' => true
            ],
        ],
        'botao' => 'Cadastrar Bandeira'
    ])
@endsection
@push('scripts')
    <!-- Importando o Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#economic_group_id').select2({
                placeholder: 'Selecione um grupo econômico',
                allowClear: true
            });
        });
    </script>
@endpush

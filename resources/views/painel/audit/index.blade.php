@extends('components.blanck')
@section('title', 'Relatorios')
@section('tela')
@if(session('success'))
    <script>
        Swal.fire({
            title: "Sucesso!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: "Erro!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif
@include('components.tabela', [
    'id' => 'tabela-grupos',
    'name_button' => 'grupo',
    'name_table' => 'Histórico de Alterações',
    'colunasTb' => [
        'id',
        'Usuário que alterou',
        'De',
        'Para',
        'Data da Alteração',
    ],
    'colunas' => $colunas,
    'dados' => $dados
]);


@endsection

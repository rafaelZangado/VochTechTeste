@extends('components.blanck')
@section('title', 'Bandeira')
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
@include('components.tabelaComponente', [
    'id' => 'tabela-grupos',
    'route' => 'flags',
    'name_button' => 'Cadastrar',
    'name_table' => 'Lista das Bandeiras',
    'colunasTb' => ['id','Nome dos Grupos','Data'],
    'colunas' => $colunas,
    'dados' => $dados
])

@endsection

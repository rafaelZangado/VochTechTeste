@extends('components.blanck')
@section('title', 'Grupo Economico')
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
    'name_button' => 'grupo',
    'name_table' => 'Lista dos Grupos',
    'colunasTb' => ['id','Nome dos Grupos','Data'],
    'colunas' => $colunas,
    'dados' => $dados
])

@endsection

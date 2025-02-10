@extends('components.blanck')
@section('title', 'Colaboradores')
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
    'route' => 'employees',
    'name_button' => 'Cadastrar Colaborador',
    'name_table' => 'Lista dos Colaboradores',
    'colunasTb' => [
        'id',
        'Nome Completo',
        'Email',
        'C.P.F',
        'Unidade',
        'Data'
    ],
    'colunas' => $colunas,
    'dados' => $dados
])

@endsection

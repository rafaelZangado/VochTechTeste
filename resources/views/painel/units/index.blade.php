@extends('components.blanck')
@section('title', 'Unidades')
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
    'route' => 'units',
    'name_button' => 'Cadastrar Unidade',
    'name_table' => 'Lista de Unidades',
    'colunasTb' => [
        'id',
        'Nome Fantasia',
        'Razão Social',
        'CNPJ',
        'Bandeira',
        'Data de Criação',
        'Ultima Atualização'
    ],
    'colunas' => $colunas,
    'dados' => $dados
])

@endsection

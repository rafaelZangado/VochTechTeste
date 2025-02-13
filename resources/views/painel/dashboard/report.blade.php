@extends('components.blanck')
@section('title', 'Relatorios')
@section('tela')
<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
        color: white;
        backdrop-filter: blur(10px);
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        opacity: 1;
    }

    .card-economic {
        background-color: rgba(0, 123, 255, 0.8);
    }

    .card-flag {
        background-color: rgba(40, 167, 69, 0.8);
    }

    .card-unit {
        background-color: rgba(255, 193, 7, 0.8);
        color: #333;
    }

    .card-employee {
        background-color: rgba(220, 53, 69, 0.8);
    }

    .card-text strong {
        float: right;
    }
</style>
<h1 class="display-5 mb-3">
    Visão Geral</b>
</h1>
<div class="row">
    <div class="col-sm-3 mb-2 mb-sm-4">
        <div class="card card-economic">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-building"></i> Grupos Econômicos
                </h5>
                <p class="card-text">Total de Registro:
                    <strong class="display-5">{{ $dados['economicGroups'] }}</strong>
                </p>
                <a href="#" class="btn btn-light"><i class="bi bi-eye"></i> Ver detalhes</a>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2 mb-sm-4">
        <div class="card card-flag">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-flag"></i> Bandeiras
                </h5>
                <p class="card-text">Total de Registro:
                    <strong class="display-5">{{ $dados['flags'] }}</strong>
                </p>
                <a href="#" class="btn btn-light"><i class="bi bi-eye"></i> Ver detalhes</a>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2 mb-sm-4">
        <div class="card card-unit">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-shop"></i> Unidades
                </h5>
                <p class="card-text">Total de Registro:
                    <strong class="display-5">{{ $dados['units'] }}</strong>
                </p>
                <a href="#" class="btn btn-dark"><i class="bi bi-eye"></i> Ver detalhes</a>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2 mb-sm-4">
        <div class="card card-employee">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-people"></i> Colaboradores
                </h5>
                <p class="card-text">Total de Registro:
                    <strong class="display-5">{{ $dados['employees'] }}</strong>
                </p>
                <a href="#" class="btn btn-light"><i class="bi bi-eye"></i> Ver detalhes</a>
            </div>
        </div>
    </div>
</div>


@endsection

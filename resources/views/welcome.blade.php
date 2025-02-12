<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>
<style>
    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .custom-table th {
        background-color: rgb(28, 107, 185);
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .dataTables_filter {
        position: relative;
        float: right;
    }

    .dataTables_filter {
        position: relative;
    }

    .dataTables_filter::before {
        content: "\F52A";
        font-family: "bootstrap-icons";
        position: absolute;
        left: 10px;
        top: 40%;
        transform: translateY(-50%);
        z-index: 2;
        color: #6c757d;
    }

    .dataTables_filter input {
        padding-left: 35px !important;
    }

    /* Ajustes finos */
    .navbar-nav {
        gap: 0.5rem;
        /* Espaço entre os itens */
    }

    .nav-link {
        min-width: 90px;
        /* Largura mínima para melhor alinhamento */
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        transform: translateY(-2px);
        /* Efeito de hover sutil */
    }

    /* Manter alinhamento no mobile */
    @media (max-width: 991px) {
        .navbar-nav {
            text-align: center;
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.5rem 0;
        }
    }
</style>

<body>
    <br>
    @if ($errors->any())
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        @foreach ($errors->all() as $error)
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>Atenção:</strong> {{ $error }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".toast").forEach(toastEl => new bootstrap.Toast(toastEl).show());
        });
    </script>
@endif
<div class="container">

    <form action="{{ route('login') }}" method="post" >
        @csrf
        <div class="row mb-4 align-items-center justify-content-end">
            <div class="col-md-3">
                <label class="fw-bold">Login:</label>
                <input type="text" name="email" class="form-control border border-success" placeholder="Digite seu e-mail">
                <div id="emailHelp" class="text-end text-muted small">
                    <a href="{{ route('create') }}">Quero criar uma conta.</a>
                </div>
            </div>

            <div class="col-md-3">
                <label class="fw-bold">Senha:</label>
                <input type="password" name="password" class="form-control border border-success" placeholder="Digite sua senha">
                <div id="passwordHelp" class="text-end text-muted small">
                    <a href="#">Esqueci minha senha.</a>
                </div>
            </div>

            <div class="col-md-2 text-center">
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </div>
        </div>
    </form>
</div>




    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/banner/banner1.png') }}" class="d-block w-100" alt="...">


            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/banner2.png') }}" class="d-block w-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</html>

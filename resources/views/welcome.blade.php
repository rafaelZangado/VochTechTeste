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
        background-color:rgb(28, 107, 185);
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
    <ul class="nav justify-content-center text-secondary">



        <li class="nav-item">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="email" name="email" class="form-text" placeholder="E-mail">
            <div id="emailHelp">Quero criar uma conta.</div>

            <input type="password" name="password" class="form-text" placeholder="Senha">
            <div id="emailHelp">Esqueci minha senha.</div>

            <input type="submit" value="Entrar">
        </form>

        </li>
        <li class="nav-item">
            <a class="nav-link disabled text-success" aria-disabled="true">
                <i class="bi bi-door-open-fill"></i> Criar conta
            </a>
        </li>
    </ul>
<br>

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


    <!-- jQuery primeiro -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables core -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Extensões -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>

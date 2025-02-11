<ul class="nav justify-content-center text-secondary">

    <li class="nav-item">
        <a class="nav-link text-secondary" href="#">
            <i class="bi bi-person-circle"></i> Olá, <b><?=Auth::user()->name?></b>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="#">
            <i class="bi bi-bell"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="#">
            <i class="bi bi-key"></i> Redefinir Senha
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="#">
            <i class="bi bi-question-circle"></i> Dúvidas Frequentes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled text-success" aria-disabled="true">
            <i class="bi bi-door-open-fill"></i> Sair
        </a>
    </li>
</ul>
<br>
<nav class="navbar navbar-expand-lg bg-success shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" >Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                @php
                    $menus = [
                        ['icon' => 'bi-building', 'label' => 'Grupos Econômicos', 'desc' => 'Gerencie grupos empresariais', 'route' => 'groups.index'],
                        ['icon' => 'bi-flag', 'label' => 'Bandeiras', 'desc' => 'Administre suas bandeiras', 'route' => 'flags.index'],
                        ['icon' => 'bi-shop', 'label' => 'Unidades', 'desc' => 'Veja e edite suas unidades', 'route' => 'units.index'],
                        ['icon' => 'bi-people', 'label' => 'Colaboradores', 'desc' => 'Gerencie sua equipe', 'route' => 'employees.index'],
                        ['icon' => 'bi-shield-lock', 'label' => 'Auditoria', 'desc' => 'Monitore atividades', 'route' => 'audits.index'],
                        ['icon' => 'bi-file-bar-graph', 'label' => 'Relatórios', 'desc' => 'Acesse relatórios detalhados', 'route' => 'relatorios.index'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <li class="nav-item text-center mx-2 position-relative">
                        <a class="nav-link text-white d-flex flex-column align-items-center menu-item" href="{{ route($menu['route']) }}">
                            <i class="bi {{ $menu['icon'] }} fs-5 mb-1"></i>
                            <span class="fw-semibold">{{ $menu['label'] }}</span>
                        </a>
                        <!-- Tooltip ao passar o mouse -->
                        <div class="menu-tooltip position-absolute text-white bg-dark rounded-3 p-2 shadow">
                            {{ $menu['desc'] }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Ajustes do menu */
    .menu-item {
        padding: 10px;
        transition: all 0.3s ease-in-out;
        border-radius: 10px;
    }

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    /* Tooltip escondido */
    .menu-tooltip {
        top: 120%;
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
        display: none;
        font-size: 0.85rem;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    /* Exibir tooltip no hover */
    .nav-item:hover .menu-tooltip {
        display: block;
        opacity: 1;
    }
</style>

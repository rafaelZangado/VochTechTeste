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
    <a class="nav-link text-secondary" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">
        <i class="bi bi-key"></i> Redefinir Senha
    </a>
</li>

    <li class="nav-item">
        <a class="nav-link text-secondary" href="#">
            <i class="bi bi-question-circle"></i> Dúvidas Frequentes
        </a>
    </li>
    <li class="nav-item">
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="nav-link text-danger bg-transparent border-0">
            <i class="bi bi-door-open-fill"></i> Sair
        </button>
    </form>
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
                        ['icon' => 'bi-file-bar-graph', 'label' => 'Relatórios', 'desc' => 'Acesse relatórios detalhados', 'route' => 'dashboard.report'],
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
<!-- Modal para Redefinição de Senha -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordModalLabel">Redefinir Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="resetPasswordForm" action="{{ route('ResetPassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" disabled placeholder="Digite seu e-mail">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="newPassword" disabled name="password" required placeholder="Digite sua nova senha">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" class="form-control" id="confirmPassword" disabled name="password_confirmation" required placeholder="Confirme sua nova senha">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" disabled>Redefinir Senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>

    .menu-item {
        padding: 10px;
        transition: all 0.3s ease-in-out;
        border-radius: 10px;
    }

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }


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


    .nav-item:hover .menu-tooltip {
        display: block;
        opacity: 1;
    }
</style>

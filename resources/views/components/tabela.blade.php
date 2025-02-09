<div class="container mt-3">
    <h1 class="display-5 text-center mb-4">Lista de Usuários</h1>
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-person-plus"></i> Novo Usuário
        </button>
    </div>

    <div class="table-responsive rounded-3 shadow">

        <table id="tabela" class="table table-hover table-bordered align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Grupo Economico</th>
                    <th class="p-3">Qtd</th>
                    <th class="p-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-3">1</td>
                    <td class="p-3">João Silva</td>
                    <td class="p-3">11</td>
                    <td class="p-3">
                        <button class="btn btn-primary btn-sm me-1">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Excluir
                        </button>
                    </td>
                </tr>
                <!-- Repita para outros itens -->
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Adicionar Novo Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" method="post" action="{{ route('economic-groups.store') }}">
                    @csrf
                    <div class="row g-3">

                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        // Destruir DataTable existente se houver
        if ($.fn.DataTable.isDataTable('#tabela')) {
            $('#tabela').DataTable().destroy();
        }

        // Inicialização única do DataTable com todas as configurações
        var table = $('#tabela').DataTable({
            dom: '<"top"<"d-flex justify-content-between"<"d-flex gap-2"B>f>>rt<"bottom"lip>',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    text: '<i class="bi bi-file-pdf"></i> PDF',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="bi bi-file-excel"></i> Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ],
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
                lengthMenu: "Mostrar _MENU_ registros por página",
                zeroRecords: "Nada encontrado",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "Nenhum registro disponível",
                infoFiltered: "(filtrado de _MAX_ registros no total)",
                search: "",
                paginate: {
                    first: "Primeiro",
                    last: "Último",
                    next: "Próximo",
                    previous: "Anterior"
                }
            },
            initComplete: function (settings, json) {
                $('.dataTables_filter input').attr('placeholder', '');
            }
        });
    });
</script>

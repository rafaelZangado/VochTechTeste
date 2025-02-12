<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-0">
        {{$name_table}}
    </h1>
    <a href="{{route($route .'.create')}}" class="btn btn-success">
        <i class="bi bi-person-plus"></i> {{$name_button}}
    </a>
</div>



<div class="card shadow-lg p-4 border-0 rounded-3">
    <table id="{{ $id ?? 'tabela' }}" class="table table-hover tb">
        <thead class="table-dark">
            <tr>
                @foreach ($colunasTb as $coluna)
                    <th class="p-3 text-capitalize">
                        {{ str_replace('_', ' ', $coluna) }}
                    </th>
                @endforeach
                <th class="p-3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($dados as $dado)
    <tr>
        @foreach ($colunas as $coluna)
            <td class="p-3">
                @if ($coluna === 'unit_name')
                    {{ $dado->unit->trade_name ?? 'Sem unidade' }}
                @elseif ($coluna === 'cpf')
                    {{ \App\Helpers\FormatHelper::formatCpfCnpj($dado->$coluna) }}
                @elseif ($coluna === 'created_at' || $coluna === 'updated_at')
                    {{ \App\Helpers\FormatHelper::formatDate($dado->$coluna) }}
                @else
                    {{ $dado->$coluna }}
                @endif
            </td>
        @endforeach
        <td class="p-3">
            <a href="{{ route($route.'.show', $dado->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="#" class="btn btn-outline-secondary btn-sm" onclick="confirmDelete({{ $dado->id }})">
                <i class="bi bi-trash"></i>
            </a>
            <form id="delete-form-{{ $dado->id }}" action="{{ route($route.'.destroy', $dado->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="{{ count($colunas) + 1 }}" class="text-center">Nenhum dado encontrado</td>
    </tr>
@endforelse


</tbody>

    </table>
</div>


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: `Tem certeza excluir {{$name_button}}da matricula ${id} ?`,
            text: "Esta ação não pode ser desfeita!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }

    $(document).ready(function () {
        // Destruir DataTable existente se houver
        if ($.fn.DataTable.isDataTable('.tb')) {
            $('.tb').DataTable().destroy();
        }

        // Inicialização única do DataTable com todas as configurações
        var table = $('.tb').DataTable({
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


<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-5 mb-0">
        {{$name_table}}
    </h1>
</div>

<div class="card shadow-lg p-4 border-0 rounded-3">
    <table id="{{ $id ?? 'tabela' }}" class="table table-hover">
        <thead class="table-dark">
            <tr>
                @foreach ($colunasTb as $coluna)
                    <th class="p-3 text-capitalize">
                        {{ str_replace('_', ' ', $coluna) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($dados as $dado)
                <tr>
                    <td class="p-3">{{ $dado['id'] }}</td>
                    <td class="p-3">
                        {{ $dado['usuario'] ?? 'Usuário Desconhecido' }}
                    </td>
                    <td class="p-3">
                        <pre>{{ json_encode($dado['de'] ?? [], JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td class="p-3">
                        <pre>{{ json_encode($dado['para'] ?? [], JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td class="p-3">{{ $dado['data_alteracao'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($colunasTb) }}" class="text-center">Nenhum dado encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

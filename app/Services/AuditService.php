<?php

namespace App\Services;

use App\Models\Audit;

class AuditService
{
    /**
     * Retorna a lista de logs de auditoria formatados.
     *
     * @return array
     */
    public function show(): array
    {
        return Audit::all()->map(function (Audit $log) {
            return [
                'id' => $log->id,
                'usuario' => $log->user_id,
                'de' => $log->old_data ?? [],
                'para' => $log->new_data ?? [],
                'data_alteracao' => $log->created_at->format('d/m/Y H:i:s'),
            ];
        })->toArray();
    }
}

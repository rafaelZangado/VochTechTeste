<?php
namespace App\Services;

use App\Models\Audit;

class AuditService
{
    protected $auditModel;

    public function __construct(Audit $auditModel)
    {
        $this->auditModel = $auditModel;
    }

    public function show()
    {
        return $this->auditModel::all()->map(function ($log) {
            return [
                'id' => $log->id,
                'usuario' => $log->user_id,
                'de' => $log->old_data ?? [],
                'para' => $log->new_data ?? [],
                'data_alteracao' => $log->created_at->format('d/m/Y H:i:s'),
            ];
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Services\AuditService;

class AuditController extends Controller
{
    protected $auditService;

    public function __construct(AuditService $auditService)
    {
        $this->auditService = $auditService;
    }
    public function index()
    {
        $logs = $this->auditService->show();
        return view('painel.audit.index', [
            'dados' => $logs,
            'colunas' => [
                'id',
                'model_type',
                'model_id',
                'action',
                'old_data',
                'new_data',
            ]
        ]);
    }
}

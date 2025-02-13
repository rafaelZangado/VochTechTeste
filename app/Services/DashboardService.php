<?php
namespace App\Services;
use App\Models\EconomicGroup;
use App\Models\Flag;
use App\Models\Unit;
use App\Models\Employee;

class DashboardService
{


    public function __construct()
    {

    }

    public function report()
    {
        return [
            'economicGroups' => EconomicGroup::count(),
            'flags' => Flag::count(),
            'units' => Unit::count(),
            'employees' => Employee::count(),
        ];
    }
}


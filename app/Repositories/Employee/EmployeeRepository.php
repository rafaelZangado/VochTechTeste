<?php
namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function findById($id)
    {
        return Employee::find($id);
    }

    public function update(array $data, int $id)
    {
        $economicGroup = Employee::find($id);
        if ($economicGroup) {
            $economicGroup->update($data);
        }
        return $economicGroup;
    }

    public function delete($id)
    {
        return Employee::destroy($id);
    }
}

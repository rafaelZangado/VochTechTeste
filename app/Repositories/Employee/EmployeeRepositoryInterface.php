<?php
namespace App\Repositories\Employee;

interface EmployeeRepositoryInterface
{
    public function create(array $data);
    public function findById(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);
}

<?php

namespace App\Services;


use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function create(array $dados)
    {
        return $this->employeeRepository->create($dados);
    }

    public function update(array $dados, int $id)
    {
        return  $this->employeeRepository->update($dados,  $id);
    }

    public function delete(int $id)
    {
        return $this->employeeRepository->delete( $id);
    }
}

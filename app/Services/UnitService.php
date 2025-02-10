<?php

namespace App\Services;


use App\Repositories\Unit\UnitRepositoryInterface;

class UnitService
{
    protected $groupRepository;

    public function __construct(UnitRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function create(array $dados)
    {
        return $this->groupRepository->create($dados);
    }

    public function update(array $dados, int $id)
    {
        return  $this->groupRepository->update($dados,  $id);
    }

    public function delete(int $id)
    {
        return $this->groupRepository->delete( $id);
    }
}

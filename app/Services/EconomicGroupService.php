<?php

namespace App\Services;


use App\Repositories\Group\EconomicGroupRepositoryInterface;

class EconomicGroupService
{
    protected $groupRepository;

    public function __construct(EconomicGroupRepositoryInterface $groupRepository)
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

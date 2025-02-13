<?php

namespace App\Services;

use App\Repositories\Group\EconomicGroupRepositoryInterface;
use Exception;

class EconomicGroupService
{
    private EconomicGroupRepositoryInterface $groupRepository;

    public function __construct(EconomicGroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Create a new economic group.
     *
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            $this->groupRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Erro ao criar grupo econômico: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing economic group.
     *
     * @param array $data
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function update(array $data, int $id): void
    {
        try {
            $this->groupRepository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar grupo econômico: ' . $e->getMessage());
        }
    }

    /**
     * Delete an economic group.
     *
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id): void
    {
        try {
            $this->groupRepository->delete($id);
        } catch (Exception $e) {
            throw new Exception('Erro ao excluir grupo econômico: ' . $e->getMessage());
        }
    }
}

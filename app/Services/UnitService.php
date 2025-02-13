<?php

namespace App\Services;

use App\Repositories\Unit\UnitRepositoryInterface;
use Exception;

class UnitService
{
    private UnitRepositoryInterface $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    /**
     * Create a new unit.
     *
     * @param array $data
     * @return \App\Models\Unit
     */
    public function create(array $data)
    {
        try {
            return $this->unitRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Erro ao criar unidade: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified unit.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Unit
     */
    public function update(array $data, int $id)
    {
        try {
            return $this->unitRepository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar unidade: ' . $e->getMessage());
        }
    }

    /**
     * Delete the specified unit.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try {
            return $this->unitRepository->delete($id);
        } catch (Exception $e) {
            throw new Exception('Erro ao excluir unidade: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Repositories\Unit;

use App\Models\Unit;
use App\Repositories\Unit\UnitRepositoryInterface;
use Exception;

class UnitRepository implements UnitRepositoryInterface
{
    /**
     * Create a new unit.
     *
     * @param array $data
     * @return \App\Models\Unit
     */
    public function create(array $data): Unit
    {
        try {
            return Unit::create($data);
        } catch (Exception $e) {
            throw new Exception('Erro ao criar unidade: ' . $e->getMessage());
        }
    }

    /**
     * Find a unit by its ID.
     *
     * @param int $id
     * @return \App\Models\Unit|null
     */
    public function findById(int $id): ?Unit
    {
        return Unit::find($id);
    }

    /**
     * Update the specified unit.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Unit|null
     */
    public function update(array $data, int $id): ?Unit
    {
        $unit = Unit::find($id);
        if ($unit) {
            $unit->update($data);
        }

        return $unit;
    }

    /**
     * Delete the specified unit.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Unit::destroy($id) > 0;
    }
}

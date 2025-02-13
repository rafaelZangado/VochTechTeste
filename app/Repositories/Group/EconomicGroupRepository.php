<?php

namespace App\Repositories\Group;

use App\Models\EconomicGroup;
use App\Repositories\Group\EconomicGroupRepositoryInterface;

class EconomicGroupRepository implements EconomicGroupRepositoryInterface
{
    /**
     * Cria um novo grupo econômico.
     *
     * @param array $data Dados do grupo econômico.
     * @return \App\Models\EconomicGroup
     */
    public function create(array $data): EconomicGroup
    {
        return EconomicGroup::create($data);
    }

    /**
     * Encontra um grupo econômico pelo seu ID.
     *
     * @param int $id ID do grupo econômico.
     * @return \App\Models\EconomicGroup|null
     */
    public function findById(int $id): ?EconomicGroup
    {
        return EconomicGroup::find($id);
    }

    /**
     * Atualiza um grupo econômico existente.
     *
     * @param array $data Dados a serem atualizados.
     * @param int $id ID do grupo econômico.
     * @return \App\Models\EconomicGroup|null
     */
    public function update(array $data, int $id): ?EconomicGroup
    {
        $economicGroup = EconomicGroup::find($id);

        if ($economicGroup) {
            $economicGroup->update($data);
        }

        return $economicGroup;
    }

    /**
     * Deleta um grupo econômico pelo seu ID.
     *
     * @param int $id ID do grupo econômico.
     * @return int Número de registros deletados.
     */
    public function delete(int $id): int
    {
        return EconomicGroup::destroy($id);
    }
}

<?php

namespace App\Repositories\Group;

use App\Models\EconomicGroup;

interface EconomicGroupRepositoryInterface
{
    /**
     * Cria um novo grupo econômico.
     *
     * @param array $data Dados do grupo econômico.
     * @return \App\Models\EconomicGroup
     */
    public function create(array $data): EconomicGroup;

    /**
     * Encontra um grupo econômico pelo seu ID.
     *
     * @param int $id ID do grupo econômico.
     * @return \App\Models\EconomicGroup|null
     */
    public function findById(int $id): ?EconomicGroup;

    /**
     * Atualiza um grupo econômico existente.
     *
     * @param array $data Dados a serem atualizados.
     * @param int $id ID do grupo econômico.
     * @return \App\Models\EconomicGroup|null
     */
    public function update(array $data, int $id): ?EconomicGroup;

    /**
     * Deleta um grupo econômico pelo seu ID.
     *
     * @param int $id ID do grupo econômico.
     * @return int Número de registros deletados.
     */
    public function delete(int $id): int;
}

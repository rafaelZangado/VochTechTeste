<?php

namespace App\Services;
use Exception;

use App\Repositories\Flag\FlagRepositoryInterface;

class FlagsService
{
    protected $flagRepository;

    public function __construct(FlagRepositoryInterface $flagRepository)
    {
        $this->flagRepository = $flagRepository;
    }

    /**
     * Create a new Flag.
     *
     * @param array $data
     * @return \App\Models\Flag
     */
    public function create(array $dados)
    {
        return $this->flagRepository->create($dados);
    }

    /**
     * Update the specified Flag.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Flag
     */
    public function update(array $dados, int $id)
    {
        return  $this->flagRepository->update($dados,  $id);
    }

     /**
     * Delete the specified Flag.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        return $this->flagRepository->delete( $id);
    }
}

<?php

namespace App\Services;


use App\Repositories\Flag\FlagRepositoryInterface;

class FlagsService
{
    protected $flagRepository;

    public function __construct(FlagRepositoryInterface $flagRepository)
    {
        $this->flagRepository = $flagRepository;
    }

    public function create(array $dados)
    {
        return $this->flagRepository->create($dados);
    }

    public function update(array $dados, int $id)
    {
        return  $this->flagRepository->update($dados,  $id);
    }

    public function delete(int $id)
    {
        return $this->flagRepository->delete( $id);
    }
}

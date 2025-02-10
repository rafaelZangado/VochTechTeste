<?php
namespace App\Repositories\Flag;

interface FlagRepositoryInterface
{
    public function create(array $data);
    public function findById(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);
}

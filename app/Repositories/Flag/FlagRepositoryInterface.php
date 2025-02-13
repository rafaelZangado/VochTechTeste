<?php
namespace App\Repositories\Flag;

interface FlagRepositoryInterface
{
    public function create(array $data): \App\Models\Flag;
    public function findById(int $id): ? \App\Models\Flag;
    public function update(array $data, int $id): ? \App\Models\Flag;
    public function delete(int $id):bool;
}

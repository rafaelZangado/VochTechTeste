<?php

namespace App\Repositories\Unit;

interface UnitRepositoryInterface
{
    public function create(array $data): \App\Models\Unit;
    public function findById(int $id): ?\App\Models\Unit;
    public function update(array $data, int $id): ?\App\Models\Unit;
    public function delete(int $id): bool;
}

<?php
namespace App\Repositories\Unit;

use App\Models\Unit;
use App\Repositories\Unit\UnitRepositoryInterface;

class UnitRepository implements UnitRepositoryInterface
{
    public function create(array $data)
    {
        return Unit::create($data);
    }

    public function findById($id)
    {
        return Unit::find($id);
    }

    public function update(array $data, int $id)
    {
        $economicGroup = Unit::find($id);
        if ($economicGroup) {
            $economicGroup->update($data);
        }
        return $economicGroup;
    }

    public function delete($id)
    {
        return Unit::destroy($id);
    }
}

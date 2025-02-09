<?php
namespace App\Repositories\Group;

use App\Models\EconomicGroup;
use App\Repositories\Group\EconomicGroupRepositoryInterface;

class EconomicGroupRepository implements EconomicGroupRepositoryInterface
{
    public function create(array $data)
    {
        return EconomicGroup::create($data);
    }

    public function findById($id)
    {
        return EconomicGroup::find($id);
    }

    public function update(array $data, int $id)
    {
        $economicGroup = EconomicGroup::find($id);
        if ($economicGroup) {
            $economicGroup->update($data);
        }
        return $economicGroup;
    }

    public function delete($id)
    {
        return EconomicGroup::destroy($id);
    }
}

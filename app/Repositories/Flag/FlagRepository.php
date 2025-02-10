<?php
namespace App\Repositories\Flag;

use App\Models\Flag;
use App\Repositories\Flag\FlagRepositoryInterface;

class FlagRepository implements FlagRepositoryInterface
{
    public function create(array $data)
    {
        return Flag::create($data);
    }

    public function findById($id)
    {
        return Flag::find($id);
    }

    public function update(array $data, int $id)
    {
        $economicGroup = Flag::find($id);
        if ($economicGroup) {
            $economicGroup->update($data);
        }
        return $economicGroup;
    }

    public function delete($id)
    {
        return Flag::destroy($id);
    }
}

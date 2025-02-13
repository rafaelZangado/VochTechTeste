<?php
namespace App\Repositories\Flag;

use App\Models\Flag;
use App\Repositories\Flag\FlagRepositoryInterface;

class FlagRepository implements FlagRepositoryInterface
{
    /**
     * Create a new Flag.
     *
     * @param array $data
     * @return \App\Models\Flag
     */
    public function create(array $data): Flag
    {
        return Flag::create($data);
    }

    /**
     * Find a Flag by its ID.
     *
     * @param int $id
     * @return \App\Models\Flag|null
     */
    public function findById($id): ?Flag
    {
        return Flag::find($id);
    }

    /**
     * Update the specified Flag.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\Flag|null
     */
    public function update(array $data, int $id):?Flag
    {
        $economicGroup = Flag::find($id);
        if ($economicGroup) {
            $economicGroup->update($data);
        }
        return $economicGroup;
    }

    /**
     * Delete the specified Flag.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id):bool
    {
        return Flag::destroy($id);
    }
}

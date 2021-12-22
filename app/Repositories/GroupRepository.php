<?php

namespace App\Repositories;

use App\Models\Group;
use App\Models\Group as Model;
use Illuminate\Database\Eloquent\Collection;

class GroupRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function getNameArray()
    {
        $group = $this->startConditions()->all()->pluck('name', 'id');

        return $group;
    }

    /**
     * @return mixed
     */
    public function getAllWithPaginator()
    {
        $columns = [
            'id',
            'name'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $result;
    }

    /**
     * @param int $id group id
     * @return mixed
     */
    public function getGroupById(int $id)
    {
        $group = $this->startConditions()
            ->where('id', $id)
            ->get()
            ->first();

        return $group;
    }

    /**
     * @param int $id group id
     * @return Collection
     */
    public function getCustomersForGroupById(int $id): Collection
    {
        $customers = $this->getGroupById($id)->customers()->where('group_id', $id)->get();

        return $customers;
    }

    /**
     * @param int $id group id
     * @return array
     */
    public function getCustomerIdsForGroup(int $id):array
    {
        $customers = $this->getCustomersForGroupById($id);

        /** @var array $customerId */
        foreach ($customers as  $customerId){
            $customersId[] = $customerId['id'];
        }

        return $customersId;
    }
}


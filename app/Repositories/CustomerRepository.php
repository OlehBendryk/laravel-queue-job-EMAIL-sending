<?php

namespace App\Repositories;

use App\Models\Customer as Model;
use Illuminate\Support\Collection;

class CustomerRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return Collection
     */
    public function getFullName(): Collection
    {
        $customers = $this->startConditions()->all()->pluck('full_name', 'id');

        return $customers;
    }

    /**
     * @return mixed
     */
    public function getAllWithPaginator()
    {
        $columns = [
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'date_of_birth',
            'sex',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $result;
    }

    /**
     * @param int $id customer id
     * @return mixed
     */
    public function getGroupForCustomerById(int $id)
    {
        $group = $this->getById($id)->groups()->where('customer_id', $id)->get()->first();

        return $group;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        $customer = $this->startConditions()
            ->where('id', $id)
            ->get()->first();

        return $customer;
    }
}


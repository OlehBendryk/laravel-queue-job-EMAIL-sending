<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\GroupRepository;

class CustomerService
{
    protected $model;

    /**
     * @param Customer $customer
     */
    public function __construct()
    {
        $this->model = app(Customer::class);
    }

    /**
     * @param array $data CustomerCreateRequest
     * @return mixed
     */
    public function create($data)
    {
        $customer = Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'date_of_birth' => $data['date_of_birth'],
            'sex' => $data['sex']
        ]);

        return $customer;
    }

    /**
     * @param array $data CustomerUpdateRequest
     * @param $id customer id
     * @return mixed
     */
    public function update($data, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'date_of_birth' => $data['date_of_birth'],
            'sex' => $data['sex']
        ]);

        return $customer;
    }

    /**
     * @param $id customer id
     * @return mixed
     */
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);

        $group = (new CustomerRepository())->getGroupForCustomerById($id);
        if ($group !== null) {
            $group->customers()->detach($id);
            $customersByGroup = (new GroupRepository())->getCustomersForGroupById($group->id)->count();

            if ($customersByGroup === 0) {
                (new GroupService())->delete($group->id);
            }
        }
        $customer->delete();

        return $customer;
    }
}


<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\GroupRepository;

class CustomerService
{
    /**
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $data CustomerCreateRequest
     * @return mixed
     */
    public function create(array $data)
    {
        $customer = new Customer();

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->date_of_birth = $data['date_of_birth'];
        $customer->sex = $data['sex'];

        $customer->save();

        return $customer;
    }

    /**
     * @param array $data CustomerUpdateRequest
     * @param int $id customer id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->date_of_birth = $data['date_of_birth'];
        $customer->sex = $data['sex'];

        $customer->save();

        return $customer;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
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


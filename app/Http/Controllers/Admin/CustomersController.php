<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Customer::all();

        return view('admin.customers.create')->with('gender', $gender);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Customer $customer)
    {
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->phone = $request->get('phone');
        $customer->date_of_birth = $request->get('date_of_birth');
        $customer->sex = $request->get('sex');

        $customer->save();

        return redirect()->route('customer.index')
            ->with('success', "Customer {$customer->first_name} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show')
            ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit')
            ->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'date_of_birth' => $request->get('date_of_birth'),
            'sex' => $request->get('sex'),
            ]);

        return redirect()->route('customer.show', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}

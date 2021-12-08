<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;

class CustomersController extends BaseController
{
    private $customerRepository;
    private $customerService;

    public function __construct(CustomerRepository $customerRepository, CustomerService $customerService)
    {
        parent::__construct();
        $this->customerRepository = $customerRepository;
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->getAllWithPaginator();

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
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerCreateRequest $request)
    {
        $customer = $this->customerService->create($request);

        return redirect()->route('customer.index')
            ->with('success', "Customer {$customer['first_name']} {$customer['last_name']} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->getById($id);

        return view('admin.customers.show')
            ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customerRepository->getById($id);

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
    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = $this->customerService->update($request, $id);

        return redirect()->route('customer.show', $customer)
            ->with('success', "{$customer->first_name} {$customer->last_name} customer data updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $customer = $this->customerService->delete($id);

        return redirect()->route('customer.index')
            ->with('success', "{$customer->first_name} {$customer->last_name} customer deleted");
    }
}

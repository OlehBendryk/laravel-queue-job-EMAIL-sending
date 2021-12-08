<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\CustomerRepository;
use App\Repositories\GroupRepository;
use App\Services\CustomerService;
use App\Services\GroupService;

class GroupsController extends BaseController
{
    private $groupService;
    private $groupRepository;
    private $customerRepository;

    /**
     * @param GroupService $groupService
     * @param CustomerService $customerService
     */
    public function __construct(GroupService $groupService, GroupRepository $groupRepository, CustomerRepository $customerRepository)
    {
        parent::__construct();
        $this->groupService = $groupService;
        $this->groupRepository = $groupRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groupRepository->getAllWithPaginator();

        return view('admin.groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customerRepository->getFullName();

        return view('admin.groups.create')
            ->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupCreateRequest $request)
    {
        $group = $this->groupService->create($request);

        return redirect()->route('group.index')
            ->with('success', "Group {$group->name} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->groupRepository->getGroupById($id);
        $customers = $this->groupRepository->getCustomersForGroupById($id);

        return view('admin.groups.show')
            ->with('group', $group)
            ->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->groupRepository->getGroupById($id);
        $customersFullName = $this->customerRepository->getFullName();
        $customersId = $this->groupRepository->getCustomerIdsForGroup($id);

        return view('admin.groups.edit')
            ->with('group', $group)
            ->with('customersId', $customersId)
            ->with('customersFullName', $customersFullName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupUpdateRequest $request, $id)
    {
        $group = $this->groupService->update($request, $id);

        return redirect()->route('group.show', $group)
            ->with('success', "Group {$group->name} successfully changed!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $group = $this->groupService->delete($id);

        return redirect()->route('group.index')
            ->with('success', "Group {$group->name} successfully deleted");
    }
}


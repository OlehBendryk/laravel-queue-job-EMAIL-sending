<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

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
        $customers = Customer::all()->pluck('full_name', 'id');

        return view('admin.groups.create')
            ->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Group $group)
    {
        $group = DB::transaction(function () use ($group, $request){
            $group->name = $request->get('name');
            $group->save();

            $group->customers()->attach($request->get('customers'));

            return $group;
        });

        return redirect()->route('group.index')
            ->with('success', "Group {$group->name} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $customers = $group->customers()->where('group_id', $group->id)->get();;

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
    public function edit(Group $group)
    {
        $customers = Customer::all()->pluck('full_name', 'id');

        return view('admin.groups.edit')
            ->with('group', $group)
            ->with('customers', $customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        $group = DB::transaction(function () use ($group, $request){
            $group->name = $request->get('name');
            $group->save();

            $customers = $request->get('customers');

            if($customers === null){
                return $group;
            } else{
                $group->customers()->sync($request->get('customers'));
            }

            return $group;
        });

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {
        if ($group){
            $customers = $group->customers()->where('group_id', $group->id)->get();;
            $group->customers()->detach($customers);

            $group->delete();
        }

        return redirect()->route('group.index')
            ->with('success', "Group {$group->name} successfully deleted");
    }
}


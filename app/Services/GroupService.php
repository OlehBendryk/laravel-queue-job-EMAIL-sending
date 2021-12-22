<?php

namespace App\Services;

use App\Models\Group;
use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\DB;

class GroupService
{
    protected $model;

    /**
     *
     */
    public function __construct()
    {
        $this->model = app(Group::class);
    }

    /**
     * @param  array $data GroupCreateRequest
     * @return mixed
     */
    public function create(array $data)
    {
        $group = DB::transaction(function () use ($data) {

            $this->model->name = $data['name'];
            $this->model->save();

            $this->model->customers()->attach($data['customers']);

            return $this->model;
        });

        return $group;
    }

    /**
     * @param array $data GroupUpdateRequest
     * @param $id group id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $group = (new GroupRepository())->getGroupById($id);

        DB::transaction(function () use ($data, $group) {

            $group->name = $data['name'];
            $group->update();

            $customers = $data['customers'];

            if ($customers === null) {
                return $group;
            } else {
                $group->customers()->sync($data['customers']);
            }
            return $group;
        });
        return $group;
    }

    /**
     * @param $id group id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function delete(int $id)
    {
        $group = (new GroupRepository())->getGroupById($id);

        if ($group){
            $customers = $group->customers()->where('group_id', $id)->get();
            $group->customers()->detach($customers);

            $group->delete();
        } else {
            return redirect()->route('group.index');
        }
        return $group;
    }
}


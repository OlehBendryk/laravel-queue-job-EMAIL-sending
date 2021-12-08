<?php

namespace App\Repositories;

use App\Models\MessageTemplate as Model;

class MailRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getGroupById($id)
    {
        $group = $this->startConditions()->groups()->where('id', $id)->get()->first();

        return $group;
    }

    /**
     * @return mixed
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'group_id',
            'subject',
            'body'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $result;
    }

}

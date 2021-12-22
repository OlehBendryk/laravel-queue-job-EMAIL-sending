<?php

namespace App\Repositories;

use App\Models\MessageTemplate as Model;
use Illuminate\Support\Collection;

class EmailTemplateRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'subject',
            'body'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $result;
    }

    public function getAllMessageTemplates(): Collection
    {
        $msg_template = $this->startConditions()->all()->pluck('subject', 'id');

        return $msg_template;
    }

}

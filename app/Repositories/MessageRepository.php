<?php

namespace App\Repositories;

use App\Models\MessageTemplate;
use App\Models\MessageTemplate as Model;

class MessageRepository extends CoreRepository
{
    /**
     * @var Model
     */
    protected $messageTemplate;

    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(MessageTemplate $messageTemplate)
    {
        $this->messageTemplate = $messageTemplate;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

}

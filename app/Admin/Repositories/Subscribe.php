<?php

namespace App\Admin\Repositories;

use App\Models\Subscribe as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Subscribe extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

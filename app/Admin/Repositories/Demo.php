<?php

namespace App\Admin\Repositories;

use App\Models\Demo as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Demo extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

<?php

namespace Modules\Itask\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itask\Entities\Priority;
use Modules\Itask\Repositories\PriorityRepository;

class PriorityApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Priority $model, PriorityRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}

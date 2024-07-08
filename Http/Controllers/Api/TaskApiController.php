<?php

namespace Modules\Itask\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itask\Entities\Task;
use Modules\Itask\Repositories\TaskRepository;

class TaskApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Task $model, TaskRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}

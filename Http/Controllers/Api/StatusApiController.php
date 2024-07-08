<?php

namespace Modules\Itask\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itask\Entities\Status;
use Modules\Itask\Repositories\StatusRepository;

class StatusApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Status $model, StatusRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}

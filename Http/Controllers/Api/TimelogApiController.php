<?php

namespace Modules\Itask\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Itask\Entities\Timelog;
use Modules\Itask\Repositories\TimelogRepository;

class TimelogApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Timelog $model, TimelogRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}

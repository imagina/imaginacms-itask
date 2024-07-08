<?php

namespace Modules\Itask\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class Timelog extends CrudModel
{

  protected $table = 'itask__timelogs';
  public $transformer = 'Modules\Itask\Transformers\TimelogTransformer';
  public $repository = 'Modules\Itask\Repositories\TaskRepository';
  public $requestValidation = [
      'create' => 'Modules\Itask\Http\Requests\CreateTimelogRequest',
      'update' => 'Modules\Itask\Http\Requests\UpdateTimelogRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  protected $fillable = [
    'task_id',
    'time_spent',
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  //============== ACCESSORS ==============//
  public function getFormatedTimeSpentAttribute()
  {
      return convertMinutesToHumanReadable($this->attributes['time_spent']);
  }
}

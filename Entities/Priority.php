<?php

namespace Modules\Itask\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Priority extends CrudModel
{
  use Translatable;

  protected $table = 'itask__priorities';
  public $transformer = 'Modules\Itask\Transformers\PriorityTransformer';
  public $repository = 'Modules\Itask\Repositories\TaskRepository';
  public $requestValidation = [
      'create' => 'Modules\Itask\Http\Requests\CreatePriorityRequest',
      'update' => 'Modules\Itask\Http\Requests\UpdatePriorityRequest',
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
  public $translatedAttributes = ['title', 'description'];
  protected $fillable = [
    'color', 'icon', 'created_at', 'updated_at', 'deleted_at'
  ];

  //============== RELATIONS ==============//
  public function tasks()
  {
      return $this->hasMany(Task::class, 'priority_id');
  }
}

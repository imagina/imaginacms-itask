<?php

namespace Modules\Itask\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Illuminate\Database\Eloquent\Model;

class Status extends CrudModel
{
  use Translatable;

  protected $table = 'itask__statuses';
  public $transformer = 'Modules\Itask\Transformers\StatusTransformer';
  public $entity = 'Modules\Itask\Entities\Status';
  public $repository = 'Modules\Itask\Repositories\TaskRepository';
  public $requestValidation = [
      'create' => 'Modules\Itask\Http\Requests\CreateStatusRequest',
      'update' => 'Modules\Itask\Http\Requests\UpdateStatusRequest',
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
  protected $fillable = ['sort_order', 'color', 'icon', 'created_at', 'updated_at', 'deleted_at'];

  //============== RELATIONS ==============//
  public function tasks()
  {
      return $this->hasMany(Task::class, 'status_id');
  }
}

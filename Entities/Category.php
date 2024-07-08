<?php

namespace Modules\Itask\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Category extends CrudModel
{
  use Translatable;

  protected $table = 'itask__categories';
  public $transformer = 'Modules\Itask\Transformers\CategoryTransformer';
  public $repository = 'Modules\Itask\Repositories\TaskRepository';
  public $requestValidation = [
      'create' => 'Modules\Itask\Http\Requests\CreateCategoryRequest',
      'update' => 'Modules\Itask\Http\Requests\UpdateCategoryRequest',
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
  protected $fillable = ['system_name', 'parent_id', 'options'];
  protected $casts = [
    'options' => 'array'
  ];

  /*
  |--------------------------------------------------------------------------
  | RELATIONS
  |--------------------------------------------------------------------------
  */
  public function parent()
  {
    return $this->belongsTo('Modules\Itask\Entities\Category', 'parent_id');
  }
}

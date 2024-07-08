<?php

namespace Modules\Itask\Entities;
use Modules\Core\Icrud\Entities\CrudModel;
use Illuminate\Database\Eloquent\Model;
use Modules\Itask\TimeHelper;

class Task extends CrudModel
{
  protected $table = 'itask__tasks';
  public $transformer = 'Modules\Itask\Transformers\TaskTransformer';
  public $entity = 'Modules\Itask\Entities\Task';
  public $repository = 'Modules\Itask\Repositories\TaskRepository';
  public $requestValidation = [
      'create' => 'Modules\Itask\Http\Requests\CreateTaskRequest',
      'update' => 'Modules\Itask\Http\Requests\UpdateTaskRequest',
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
    'title', 
    'description',
    'start_date',
    'end_date',
    'status_id',
    'priority_id',
    'estimated_time',
    'assigned_to_id',
    'category_id',
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  //============== ACCESSORS ==============//
  public function getFormatedEstimatedTimeAttribute()
  {
    //dd($this->attributes['estimated_time']);
      return TimeHelper::convertMinutesToHumanReadable($this->attributes['estimated_time']);
  }

  public function getDurationAttribute()
  {
      return TimeHelper::humanizeDuration($this->attributes['start_date'], $this->attributes['end_date']);
  }

  public function getTotalTimelogsDurationInMinutesAttribute()
  {
      return $this->timelogs->sum('time_spent');
  }

  public function getTotalFormatedTimelogsDurationAttribute()
  {
      $totalMinutes = $this->timelogs->sum('time_spent');
      // 1d 2h 40m...
      return TimeHelper::convertMinutesToHumanReadable($totalMinutes);
  }
  //============== RELATIONS ==============//
  public function status()
  {
      return $this->belongsTo(Status::class, 'status_id');
  }

  public function priority()
  {
      return $this->belongsTo(Priority::class, 'priority_id');
  }

  public function assignedTo()
  {
    $driver = config('asgard.user.config.driver');

    return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
  }

  public function category()
  {
      return $this->belongsTo(Category::class, 'category_id');
  }

  public function timelogs()
  {
      return $this->hasMany(Timelog::class, 'task_id');
  }
}

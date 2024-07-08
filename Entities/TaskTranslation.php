<?php

namespace Modules\Itask\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
    protected $table = 'itask__task_translations';
}

<?php

namespace Modules\Itask\Entities;

use Illuminate\Database\Eloquent\Model;

class PriorityTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    protected $table = 'itask__priority_translations';
}

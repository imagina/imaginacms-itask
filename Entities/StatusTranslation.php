<?php

namespace Modules\Itask\Entities;

use Illuminate\Database\Eloquent\Model;

class StatusTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    protected $table = 'itask__status_translations';
}

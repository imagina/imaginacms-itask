<?php

namespace Modules\Itask\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];
    
    protected $table = 'itask__category_translations';
}

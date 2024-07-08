<?php

namespace Modules\Itask\Repositories\Cache;

use Modules\Itask\Repositories\CategoryRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheCategoryDecorator extends BaseCacheCrudDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'itask.categories';
        $this->repository = $category;
    }
}

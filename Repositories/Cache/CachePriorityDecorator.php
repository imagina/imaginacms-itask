<?php

namespace Modules\Itask\Repositories\Cache;

use Modules\Itask\Repositories\PriorityRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CachePriorityDecorator extends BaseCacheCrudDecorator implements PriorityRepository
{
    public function __construct(PriorityRepository $priority)
    {
        parent::__construct();
        $this->entityName = 'itask.priorities';
        $this->repository = $priority;
    }
}

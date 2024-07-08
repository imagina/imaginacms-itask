<?php

namespace Modules\Itask\Repositories\Cache;

use Modules\Itask\Repositories\TaskRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheTaskDecorator extends BaseCacheCrudDecorator implements TaskRepository
{
    public function __construct(TaskRepository $task)
    {
        parent::__construct();
        $this->entityName = 'itask.tasks';
        $this->repository = $task;
    }
}

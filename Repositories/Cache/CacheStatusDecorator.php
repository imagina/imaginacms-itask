<?php

namespace Modules\Itask\Repositories\Cache;

use Modules\Itask\Repositories\StatusRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheStatusDecorator extends BaseCacheCrudDecorator implements StatusRepository
{
    public function __construct(StatusRepository $status)
    {
        parent::__construct();
        $this->entityName = 'itask.statuses';
        $this->repository = $status;
    }
}

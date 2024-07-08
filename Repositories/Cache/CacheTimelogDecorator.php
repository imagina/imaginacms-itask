<?php

namespace Modules\Itask\Repositories\Cache;

use Modules\Itask\Repositories\TimelogRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheTimelogDecorator extends BaseCacheCrudDecorator implements TimelogRepository
{
    public function __construct(TimelogRepository $timelog)
    {
        parent::__construct();
        $this->entityName = 'itask.timelogs';
        $this->repository = $timelog;
    }
}

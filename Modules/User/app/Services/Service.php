<?php

namespace User\App\Services;

use User\App\Repositories\Repository;

/**
 * @inheritDoc
 * saveAll
 */
class Service extends \Core\App\Services\Service
{
    protected $repository = Repository::class;
}

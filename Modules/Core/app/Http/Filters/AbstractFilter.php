<?php

namespace Core\App\Http\Filters;

use MP\Base\Http\Filters\Query\RelationQuery;
use MP\Base\Http\Filters\Query\SelfQuery;

class AbstractFilter extends \MP\Base\Http\Filters\Filter\AbstractFilter
{
    protected $queries = [
        'self' => \Core\App\Http\Filters\Query\SelfQuery::class,
        'relation' => RelationQuery::class
    ];
}

<?php

namespace User\App\Http\Filters;


use Core\App\Http\Filters\AbstractFilter;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'name' => [
            'type' => 'self',
            'operand' => 'like',
            'column' => 'name'
        ],
        'email' => [
            'type' => 'self',
            'operand' => 'like',
            'column' => 'email'
        ],
    ];
}

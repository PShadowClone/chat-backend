<?php

namespace Core\App\Http\Filters\Query;

class SelfQuery extends \MP\Base\Http\Filters\Query\SelfQuery
{
    /**
     * @param $builder
     * @param $filter
     * @return mixed
     * filter by column inside same table
     * @author khalid
     * @override_by Amr
     */
    public function filter($builder, $filter)
    {
        return $builder->{$filter['method']}($filter['column'], $filter['operand'], $filter['value']);
    }
}

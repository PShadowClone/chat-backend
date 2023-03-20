<?php

namespace User\App\Repositories;

use Illuminate\Http\Request;

class Repository extends \Core\App\Repositories\Repository
{
    /**
     * store new resource
     *
     * @param Request $request
     * @return mixed
     *
     * @author Amr
     */
    function store(Request $request)
    {
        $model = $this->getModel()->create($this->getRequestAttributes($request));
        $__hasRelation = $this->hasRelation();
        if ($__hasRelation)
            $this->storeRelation($request, $model);
        return $this->collection($model);
    }
}

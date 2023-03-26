<?php

namespace Core\App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use MongoDb\Mongo;

class Repository extends \MP\Base\Repositories\Repository
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

    /**
     * update resource according to the given
     * id
     *
     * @param Request $request
     * @param $id
     * @return mixed
     *
     * @author Amr
     */
    public function update(Request $request, $id)
    {
        $model = $this->findModel($id ?? request()->route('id'));
        $model->fill($this->getRequestAttributes($request));
        $model->update();
        $__hasRelation = $this->hasRelation();
        if ($__hasRelation)
            $this->updateRelation($request, $model);
        return $this->collection($model->refresh());
    }
}

<?php

namespace MongoDb\Traits;

use Illuminate\Database\Eloquent\Model;

trait Store
{
    /**
     * save a new resource
     * @param Model $model
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author Amr
     */
    public function save(array $model)
    {
        $bulk = $this->getWriter();
        $bulk->insert($this->prepareAttributes($model));
        return $this->_connection->executeBulkWrite($this->getCollectionName($model), $bulk);
    }

    /**
     * save a collection of models
     * @param array $models
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author Amr
     */
    public function saveAll(array $models)
    {
        $bulk = $this->getWriter();
        $models = collect($models);
        $models->each(fn($model) => $bulk->insert($model));
        return $this->_connection->executeBulkWrite($this->getCollectionName($models->firstOrFail()), $bulk);
    }
}

<?php

namespace MongoDb\Traits;

use Illuminate\Database\Eloquent\Model;

trait Common
{
    /**
     * get only the fillable data from
     * the passed model
     * @param Model $model
     * @return array
     * @author Amr
     */
    public function prepareAttributes(array $model)
    {
        return collect($model)->only($this->model->getFillable())->toArray();
    }

    /**
     * get the collection name
     * @param Model $model
     * @return string
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author Amr
     */
    public function getCollectionName($model)
    {
        return $this->_config->get('database') . '.' . $this->model->getTable();
    }

    /**
     * returns an instance off BulkWriter
     * @return MongoDB\Driver\BulkWrite
     * @author Amr
     */
    public function getWriter()
    {
        return new \MongoDB\Driver\BulkWrite;
    }
}

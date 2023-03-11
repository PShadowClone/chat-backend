<?php

namespace Core\App\Services;

class Service
{
    protected $repository = null;

    public function __construct()
    {
        $this->repository = new $this->repository();
    }

    public function __call(string $name, array $arguments)
    {
        return $this->repository->$name(...$arguments);
    }
}

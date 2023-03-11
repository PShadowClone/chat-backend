<?php

namespace MongoDb\Utilities;

class Config
{
    /**
     * local config of mongo db
     * @var array
     */
    private $_configs = [];

    public function __construct()
    {
        $this->_loadConfigs();
    }

    /**
     * this function loads the configs once
     * @return void
     * @author Amr
     */
    private function _loadConfigs()
    {
        $this->_configs = config('database.connections.mongodb');
    }

    /**
     * get mongodb attributes
     * @param $attribute
     * @param $default
     * @return mixed|null
     */
    public function get($attribute, $default = null)
    {
        return $this->_configs[$attribute] ?? $default;
    }
}

<?php

namespace MongoDb\Properties;


use MongoDb\Utilities\Config;

class Connection
{

    /**
     * mongodb connection
     * @var null
     * @author Amr
     */
    private $_connection = null;
    /**
     * mongodb configs
     * @var \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private $_config = [];

    function __construct()
    {
        $this->_config = app(Config::class);
        $this->_setUpConnection();
    }

    /**
     * this unit returns the connection of mongodb
     * @return \MongoDB\Driver\Manager
     * @author Amr
     */
    private function _setUpConnection()
    {
        if (!$this->_connection)
            $this->_connection = new \MongoDB\Driver\Manager("{$this->_config->get('host')}:{$this->_config->get('port')}", [
                'username' => $this->_config->get('username'),
                'password' => $this->_config->get('password')
            ]);
    }

    /**
     * returns connection
     * @return null
     * @author Amr
     */
    public function getConnection()
    {
        return $this->_connection;
    }

}

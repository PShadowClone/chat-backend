<?php

namespace MongoDb;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use MongoDb\Properties\Connection;
use MongoDb\Traits\Common;
use MongoDb\Traits\Store;
use MongoDb\Utilities\Config;

class Mongo
{
    use Common, Store;

    private $_connection;
    private $_config;
    private  $model = User::class;

    public function __construct()
    {
        $this->model = new $this->model;
        $this->_connection = app(Connection::class)->getConnection();
        $this->_config = app(Config::class);
    }
}

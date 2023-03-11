<?php

namespace MongoDb;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use MongoDb\Utilities\Config;

class MongoDbServiceProvider extends ServiceProvider
{

    public function boot()
    {
        parent::boot();
        App::singleton(Config::class, function () {
            return new Config();
        });

    }


    public function register()
    {
        parent::register();
    }

}

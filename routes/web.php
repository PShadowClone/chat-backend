<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    dd(app(\MongoDb\Properties\Connection::class));
// Manager Class
    $manager = new MongoDB\Driver\Manager("mongodb://mongo:27017" , [
        'username' => 'root',
        'password' => 'example'
    ]);

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['x' => 1]);
    $bulk->insert(['x' => 2]);
    $bulk->insert(['x' => 3]);
    $manager->executeBulkWrite('chat.users', $bulk);

    $filter = ['x' => ['$gt' => 1]];
    $options = [
        'projection' => ['_id' => 0],
        'sort' => ['x' => -1],
    ];

    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('chat.users', $query);

//    foreach ($cursor as $document) {
//        var_dump($document);
//    }

    foreach ($cursor as $document) {
        dd($document);
    }


    return view('welcome');
});

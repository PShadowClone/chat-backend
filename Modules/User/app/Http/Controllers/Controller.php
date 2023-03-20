<?php

namespace User\App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class Controller extends \MP\Base\Http\Controllers\Controller
{

    public function store(\MP\Base\Http\Requests\Request $request)
    {
        return response('$content')
            ->header('Content-Type', 'application/json')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
//        dd(parent::store($request));
    }
}

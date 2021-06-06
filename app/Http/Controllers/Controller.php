<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        /*
        $access_token = Cache::get('access_token');
        // add time
        if($access_token){
            $token_timeout = \Config::get('values.token_timeout');
            Cache::put('access_token', $access_token, $token_timeout);
        }
        */
    }
}

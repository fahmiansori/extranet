<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\APITrait;

use Validator;

class DashboardController extends Controller
{
    use APITrait;

    public function __construct()
    {
    }

    public function index()
    {
        return view('dashboard.index');
    }
}

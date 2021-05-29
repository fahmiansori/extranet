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
        $data = [];
        $data['page_active'] = 'dashboard';
        $data['title_top'] = 'Dashboard';

        return view('dashboard.index', $data);
    }

    public function partnerProfile()
    {
        $data = [];
        $data['page_active'] = 'dashboard.partner-profile';
        $data['title_top'] = 'Partner Profile';

        return view('dashboard.partner_profile', $data);
    }
}

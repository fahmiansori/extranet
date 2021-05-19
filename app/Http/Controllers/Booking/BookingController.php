<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\APITrait;

use Validator;

class BookingController extends Controller
{
    use APITrait;

    public function index()
    {
        $data = [];
        $data['page_active'] = 'booking';
        $data['title_top'] = 'Booking';
        $data['title_page'] = 'Booking Page';

        return view('booking.index', $data);
    }
}

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

        $data['data_hotel'] = [];
        $params = [
            'end_point_url' => '/hotelPartner/listHotel',
            'is_use_auth' => true,
            'is_api' => true,
        ];
        $data_hotel = json_decode($this->send_request($params));

        $data_hotel = ($data_hotel->status == 'success' && $data_hotel->response_obj->result)? $data_hotel->response_obj->hotel:[];
        $data['data_hotel'] = $data_hotel;

        return view('booking.index', $data);
    }
}

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

    public function list(Request $request){
        $validation = [
            'id_hotel' => 'required',
            'page' => 'required',
            'perPage' => 'required',
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->passes()){
            $id_hotel = $request->id_hotel;
            $id_kamar = $request->id_kamar;
            $q = $request->q;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $page = $request->page;
            $perPage = $request->perPage;

            $method = 'POST';
            $url = '/booking/list';

            $form_params = [
                'id_hotel' => $id_hotel,
                'id_kamar' => $id_kamar,
                'q' => $q,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'page' => $page,
                'perPage' => $perPage,
            ];
            $params = [
                'method' => $method,
                'form_params_input' => $form_params,
                'end_point_url' => $url,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data = [];
            $data['status'] = 'failed';
            $data['message'] = 'Failed to get data!';
            $data['total'] = 0;
            $data['data'] = [];
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = '';
                $data['total'] = $save->response_obj->total;
                $data['data'] = $save->response_obj->data;
            }

            return response()->json($data);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function detail(Request $request){
        $validation = [
            'id_hotel' => 'required',
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->passes()){
            $id_hotel = $request->id_hotel;
            $booking_code = $request->booking_code;

            $method = 'POST';
            $url = '/booking/getBooking/'. $booking_code;

            $form_params = [
                'id_hotel' => $id_hotel,
            ];
            $params = [
                'method' => $method,
                'form_params_input' => $form_params,
                'end_point_url' => $url,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data = [];
            $data['status'] = 'failed';
            $data['message'] = 'Failed to get data!';
            $data['total'] = 0;
            $data['data'] = '';
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = '';
                $data['data'] = $save->response_obj->data;
            }
            if($save->status == 'success' && !$save->response_obj->result){
                $data['status'] = 'failed';
                $data['message'] = $save->response_obj->message;
            }

            return response()->json($data);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}

<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\APITrait;

use Validator;

class HotelController extends Controller
{
    use APITrait;

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page_active'] = 'hotel';
        $data['data_hotel'] = [];

        $params = [
            'end_point_url' => '/hotelPartner/listHotel',
            'is_use_auth' => true,
            'is_api' => true,
        ];
        $data_hotel = json_decode($this->send_request($params));
        $data_hotel = ($data_hotel->status == 'success' && $data_hotel->response_obj->result)? $data_hotel->response_obj->hotel:[];
        $data['data_hotel'] = $data_hotel;

        return view('hotel.index', $data);
    }

    public function detail(Request $request){
        $hotel_id = $request->hotel_id;
        $data = [];
        $data['status'] = 'failed';
        $data['data'] = [];
        $data_hotel = [];

        if($hotel_id && !empty($hotel_id)){
            $params = [
                'end_point_url' => '/hotelPartner/detail/'. $hotel_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_hotel = json_decode($this->send_request($params));
            if($data_hotel->status == 'success' && $data_hotel->response_obj->result){
                $data_hotel = $data_hotel->response_obj->hotel;
                $data['status'] = 'success';
            }else{
                $data_hotel = [];
            }
        }
        $data['data'] = $data_hotel;

        return json_encode($data);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
            'hotel_name' => 'required',
            'star_rating' => 'required',
            'hotel_address' => 'required',
            'hotel_contact' => 'required',
        ]);

        if($validator->passes()){
            $hotel_id = $request->hotel_id;
            $hotel_name = $request->hotel_name;
            $star_rating = $request->star_rating;
            $hotel_address = $request->hotel_address;
            $hotel_contact = $request->hotel_contact;
            $hotel_facility = $request->hotel_facility;
            $check_in = $request->check_in;
            $check_out = $request->check_out;
            $email = $request->email;
            $website = $request->website;
            $status = $request->status;

            $form_params = [
                'nama_hotel' => $hotel_name,
                'bintang_hotel' => $star_rating,
                'alamat_hotel' => $hotel_address,
                'telepon' => $hotel_contact,
                'check_in' => $check_in,
                'check_out' => $check_out,
                'email' => $email,
                'website' => $website,
                'status' => $status,
            ];
            $params = [
                'method' => 'PUT',
                'form_params_input' => $form_params,
                'end_point_url' => '/hotelPartner/update/'. $hotel_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data = [];
            $data['status'] = 'failed';
            $data['message'] = 'Failed to save data!';
            $data['message'] = $save->message;
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = $save->response_obj->message;
            }

            return response()->json($data);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function roomForm()
    {
        return view('hotel.room_form');
    }
}

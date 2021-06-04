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

    public function detailPhoto(Request $request){
        $hotel_id = $request->hotel_id;
        $data = [];
        $data['status'] = 'failed';
        $data['data'] = [];
        $data_ = [];

        if($hotel_id && !empty($hotel_id)){
            $params = [
                'end_point_url' => '/hotelPhoto/show/'. $hotel_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $data_ = $data_->response_obj->data;
                $data['status'] = 'success';
            }else{
                $data_ = [];
            }
        }
        $data['data'] = $data_;

        return response()->json($data);
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

    public function roomForm(){
        return view('hotel.room_form');
    }

    public function detailPhotoUpload(Request $request){
        $validator = Validator::make($request->all(), [
            'id_hotel' => 'required',
            'flag_utama' => 'required',
            'image_hotel' => 'required',
        ]);

        if($validator->passes()){
            $id_hotel = $request->id_hotel;
            $flag_utama = $request->flag_utama;
            $image_hotel = ($request->hasFile('image_hotel'))? $request->file('image_hotel'):'';

            $form_params = [
                'id_hotel' => $id_hotel,
                'flag_utama' => $flag_utama,
                'image_hotel' => $image_hotel,
            ];
            $form_params_options = [
                [
                    'field' => 'image_hotel',
                    'type' => 'file'
                ]
            ];
            $params = [
                'method' => 'POST',
                'form_params_input' => $form_params,
                'form_params_options' => $form_params_options,
                'end_point_url' => '/hotelPhoto/store',
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

    public function detailPhotoDelete(Request $request){
        $image_id = $request->image_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to delete data!';

        if($image_id && !empty($image_id)){
            $params = [
                'method' => 'DELETE',
                'end_point_url' => '/hotelPhoto/delete/'. $image_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data['message'] = $save->message;
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = $save->response_obj->message;
            }

        }
        return response()->json($data);
    }

    public function detailPhotoUpdatePrimary(Request $request){
        $image_id = $request->image_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to update data!';

        if($image_id && !empty($image_id)){
            $params = [
                'method' => 'PUT',
                'end_point_url' => '/hotelPhoto/update/'. $image_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data['message'] = $save->message;
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = $save->response_obj->message;
            }

        }
        return response()->json($data);
    }

    public function rooms(Request $request){
        $hotel_id = $request->hotel_id;
        $q = (!empty($request->q))? $request->q:'';
        $sortBy = (!empty($request->sortBy))? $request->sortBy:'price-desc';
        $page = (!empty($request->page))? $request->page:1;
        $perPage = (!empty($request->perPage))? $request->perPage:10;
        $data = [];
        $data['status'] = 'failed';
        $data['total'] = 0;
        $data['data'] = [];
        $data_ = [];

        if($hotel_id && !empty($hotel_id)){
            $params = [
                'end_point_url' => '/kamarPartner/list/'. $hotel_id .'?q='. $q .'&sortBy='. $sortBy .'&page='. $page .'&perPage='. $perPage .'',
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $res = $data_->response_obj;
                $data_ = $res->data;
                $total_ = $res->total;
                $data['total'] = $total_;
                $data['status'] = 'success';
            }else{
                $data_ = [];
            }
        }
        $data['data'] = $data_;

        return response()->json($data);
    }

    public function detailRoom(Request $request){
        $room_id = $request->room_id;
        $data = [];
        $data['status'] = 'failed';
        $data['data'] = [];
        $data_ = [];

        if($room_id && !empty($room_id)){
            $params = [
                'end_point_url' => '/kamarPartner/show/'. $room_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $data_ = $data_->response_obj->hotel;
                $data['status'] = 'success';
            }else{
                $data_ = [];
            }
        }
        $data['data'] = $data_;

        return response()->json($data);
    }

    public function setInactiveRoom(Request $request){
        $room_id = $request->room_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to set inactive!';
        $data['data'] = [];

        if($room_id && !empty($room_id)){
            $params = [
                'end_point_url' => '/kamarPartner/close/'. $room_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $data['message'] = $data_->response_obj->message;
                $data['status'] = 'success';
            }
        }

        return response()->json($data);
    }

    public function setActiveRoom(Request $request){
        $room_id = $request->room_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to set inactive!';
        $data['data'] = [];

        if($room_id && !empty($room_id)){
            $params = [
                'end_point_url' => '/kamarPartner/open/'. $room_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $data['message'] = $data_->response_obj->message;
                $data['status'] = 'success';
            }
        }

        return response()->json($data);
    }

    public function saveRoom(Request $request){
        $room_id = $request->room_id;
        $hotel_id = $request->hotel_id;

        $validation = [
            'room_name' => 'required',
            'room_price' => 'required',
            'max_occupancy' => 'required',
        ];

        if(!$room_id || empty($room_id)){
            $validation['hotel_id'] = 'required';
        }
        if(!$hotel_id || empty($hotel_id)){
            $validation['room_id'] = 'required';
        }

        $validator = Validator::make($request->all(), $validation);

        if($validator->passes()){
            $room_name = $request->room_name;
            $room_price = $request->room_price;
            $room_selling_price = $request->room_selling_price;
            $number_of_room = $request->number_of_room;
            $room_size = $request->room_size;
            $max_occupancy = $request->max_occupancy;
            $max_extra_beds = $request->max_extra_beds;
            $extra_bed_price = $request->extra_bed_price;
            $extra_bed_selling_price = $request->extra_bed_selling_price;
            $breakfast_included = $request->breakfast_included;
            $wifi_included = $request->wifi_included;

            $is_extrabed = ($max_extra_beds > 0)? 1:0;

            $method = 'POST';
            $url = '/kamarPartner/store';
            if(!empty($room_id)){
                $method = 'PUT';
                $url = '/kamarPartner/update/'. $room_id;
            }

            $form_params = [
                'id_hotel' => $hotel_id,
                'kamar' => $room_name,
                'maks_orang' => $max_occupancy,
                'sarapan' => $breakfast_included,
                'wifi' => $wifi_included,
                'ukuran' => $room_size,
                'jumlah' => $number_of_room,
                'harga' => $room_price,
                'extrabed' => $is_extrabed,
                'maks_extrabed' => $max_extra_beds,
                'harga_extrabed' => $extra_bed_price,
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

    public function roomPhoto(Request $request){
        $room_id = $request->room_id;
        $data = [];
        $data['status'] = 'failed';
        $data['data'] = [];
        $data_ = [];

        if($room_id && !empty($room_id)){
            $params = [
                'end_point_url' => '/kamarPhoto/show/'. $room_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && $data_->response_obj->result){
                $data_ = $data_->response_obj->data;
                $data['status'] = 'success';
            }else{
                $data_ = [];
            }
        }
        $data['data'] = $data_;

        return response()->json($data);
    }

    public function roomPhotoUpload(Request $request){
        $validator = Validator::make($request->all(), [
            'room_id' => 'required',
            'flag_utama' => 'required',
            'image_room_photos' => 'required',
        ]);

        if($validator->passes()){
            $room_id = $request->room_id;
            $flag_utama = $request->flag_utama;
            $image_room_photos = ($request->hasFile('image_room_photos'))? $request->file('image_room_photos'):'';

            $form_params = [
                'id_kamar' => $room_id,
                'flag_utama' => $flag_utama,
                'image_kamar' => $image_room_photos,
            ];
            $form_params_options = [
                [
                    'field' => 'image_kamar',
                    'type' => 'file'
                ]
            ];
            $params = [
                'method' => 'POST',
                'form_params_input' => $form_params,
                'form_params_options' => $form_params_options,
                'end_point_url' => '/kamarPhoto/store',
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

    public function roomPhotoDelete(Request $request){
        $image_id = $request->image_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to delete data!';

        if($image_id && !empty($image_id)){
            $params = [
                'method' => 'DELETE',
                'end_point_url' => '/kamarPhoto/delete/'. $image_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data['message'] = $save->message;
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = $save->response_obj->message;
            }

        }
        return response()->json($data);
    }

    public function roomPhotoUpdatePrimary(Request $request){
        $image_id = $request->image_id;
        $data = [];
        $data['status'] = 'failed';
        $data['message'] = 'Failed to update data!';

        if($image_id && !empty($image_id)){
            $params = [
                'method' => 'PUT',
                'end_point_url' => '/kamarPhoto/update/'. $image_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $save = json_decode($this->send_request($params));

            $data['message'] = $save->message;
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = $save->response_obj->message;
            }

        }
        return response()->json($data);
    }
}

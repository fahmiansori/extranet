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
        $data['data_hotel'] = [];

        $params = [
            'end_point_url' => '/hotelPartner/listHotel',
            'is_use_auth' => true,
            'is_api' => true,
        ];
        $data_hotel = json_decode($this->send_request($params));

        $data_hotel = ($data_hotel->status == 'success' && $data_hotel->response_obj->result)? $data_hotel->response_obj->hotel:[];
        $data['data_hotel'] = $data_hotel;

        return view('dashboard.index', $data);
    }

    public function partnerProfile()
    {
        $data = [];
        $data['page_active'] = 'dashboard.partner-profile';
        $data['title_top'] = 'Partner Profile';
        $data['data'] = [];

        $partner_id = Cache::get('partner_id');
        $partner_data = [];
        if($partner_id){
            $params = [
                'end_point_url' => '/profilPartner/show/'. $partner_id,
                'is_use_auth' => true,
                'is_api' => true,
            ];
            $data_ = json_decode($this->send_request($params));
            if($data_->status == 'success' && !empty($data_->response_obj->data)){
                $data_ = $data_->response_obj->data;
                $data['status'] = 'success';
            }else{
                $data_ = [];
            }

            $partner_data = $data_;
        }
        $data['data'] = $partner_data;

        return view('dashboard.partner_profile', $data);
    }

    public function partnerProfileSave(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        if($validator->passes()){
            $id = $request->id;
            $nama = $request->nama;
            $gambar = ($request->hasFile('gambar'))? $request->file('gambar'):'';
            $alamat = $request->alamat;
            $telepon = $request->telepon;

            $form_params = [
                'id' => $id,
                'nama' => $nama,
                'image_partner' => $gambar,
                'alamat' => $alamat,
                'telepon' => $telepon,
            ];
            $form_params_options = [
                [
                    'field' => 'image_partner',
                    'type' => 'file'
                ]
            ];
            $params = [
                'method' => 'POST',
                'form_params_input' => $form_params,
                'form_params_options' => $form_params_options,
                'end_point_url' => '/profilPartner/update/'. $id,
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

    public function getReportChartData(Request $request){
        $validation = [
            'id_hotel' => 'required',
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->passes()){
            $id_hotel = $request->id_hotel;
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $method = 'POST';
            $url = '/dashboardPartner/getData';

            $form_params = [
                'id_hotel' => $id_hotel,
                'start_date' => $start_date,
                'end_date' => $end_date,
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
            $data['data'] = [];
            if($save->status == 'success' && $save->response_obj->result){
                $data['status'] = 'success';
                $data['message'] = '';
                $data['data'] = $save->response_obj->data;
            }

            return response()->json($data);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}

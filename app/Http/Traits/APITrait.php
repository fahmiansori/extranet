<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

trait APITrait {
    public function send_request($params) {
        $headers = [
            'Accept' => 'application/json',
        ];

        $method = (array_key_exists('method', $params))? $params['method']:'GET';
        $end_point_url = (array_key_exists('end_point_url', $params))? $params['end_point_url']:'';
        $form_params_input = (array_key_exists('form_params_input', $params))? $params['form_params_input']:[];
        $is_use_auth = (array_key_exists('is_use_auth', $params))? $params['is_use_auth']:false;
        $is_api = (array_key_exists('is_api', $params))? $params['is_api']:false; // jika API request, maka tidak redirect

        if($is_use_auth){
            $check_auth = $this->check_auth($is_api);

            if($check_auth && $access_token){
                $access_token = Cache::get('access_token');
                $headers['Authorization'] = 'Bearer ' . $access_token;
            }
        }

        $form_params = $form_params_input;
        $end_point = $end_point_url; // '/api_passport/public/api/login'

        $base_uri = \Config::get('values.base_uri');
        $client = new Client(['base_uri' => $base_uri]);

        $response_code = 0;
        $response = '';
        $response_obj = [];
        $status = 'failed';
        $message = '';
        if($check_auth){
            try {
                $data_send = [
                    'headers' => $headers
                ];
                if(count($form_params) > 0){
                    $data_send['form_params'] = $form_params;
                }

                $request = $client->request($method, $end_point, $data_send);
                $response_code = $request->getStatusCode(); // success : 200
                $response = $request->getBody();
                $response_obj = json_decode($response, true); // as array

                if($response_code == 200){
                    $message = 'Request success';
                    $status = 'success';
                }else{
                    $message = 'Request failed. CODE:'.$response_code;
                }
            }
            catch (\GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = 'Request failed : ClientException';
            }
            catch (\GuzzleHttp\Exception\ServerException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = 'Request failed : ServerException';
            }
        }else{
            $message = 'Unauthorized';
        }

        $data = [
            'status' => $status,
            'response_code' => $response_code,
            'response' => $response,
            'response_obj' => $response_obj,
            'message' => $message
        ];

        return response()->json($data);
    }

    public function check_auth($is_api = false) {
        $access_token = Cache::get('access_token');

        if(!$access_token){
            if(!$is_api){
                return redirect()->route('login');
            }

            return false;
        }

        return true;
    }
}

<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

use Config;

trait APITrait {
    public function send_request($params) {
        $headers = [
            'Accept' => 'application/json',
        ];

        $method = (array_key_exists('method', $params))? $params['method']:'GET';
        $end_point_url = (array_key_exists('end_point_url', $params))? $params['end_point_url']:'';
        $form_params_input = (array_key_exists('form_params_input', $params))? $params['form_params_input']:[];
        $form_params_options = (array_key_exists('form_params_options', $params))? $params['form_params_options']:[];
        $is_use_auth = (array_key_exists('is_use_auth', $params))? $params['is_use_auth']:false;
        $is_api = (array_key_exists('is_api', $params))? $params['is_api']:false; // jika API request, maka tidak redirect

        if($is_use_auth){
            $check_auth = $this->check_auth($is_api);
            $access_token = Cache::get('access_token');

            if($check_auth && $access_token){
                $headers['Authorization'] = 'Bearer ' . $access_token;
            }
        }

        if($method == 'PUT'){
            $headers['Accept'] = 'application/x-www-form-urlencoded';
        }

        $form_params_input_multipart = [];
        if($form_params_options){
            $multipart_ = [];
            $multipart_keys = [];
            foreach($form_params_options as $key){
                $field_ = $key['field'];
                $type_ = $key['type'];

                $content_ = '';
                if($form_params_input[$field_]){
                    $content_ = fopen($form_params_input[$field_]->getPathName(), 'r');
                }
                $multipart_[] = [
                    'Content-type' => 'multipart/form-data',
                    'name' => $field_,
                    'contents' => $content_
                ];

                $multipart_keys[] = $field_;
            }

            foreach($form_params_input as $key => $value){
                if(!in_array($key, $multipart_keys)){
                    $multipart_[] = [
                        'Content-type' => 'multipart/form-data',
                        'name' => $key,
                        'contents' => $value
                    ];
                }
            }

            $form_params_input_multipart = $multipart_;
        }

        $form_params_multipart = $form_params_input_multipart;
        $form_params = $form_params_input;
        $end_point = '/api'. $end_point_url; // '/api_passport/public/api/login'

        $base_uri = Config::get('values.base_uri');
        $client = new Client(['base_uri' => $base_uri]);

        $response_code = 0;
        $response = '';
        $response_obj = [];
        $status = 'failed';
        $message = '';
        $is_session_expired = false;
        if($check_auth){
            try {
                $data_send = [
                    'headers' => $headers
                ];
                if(count($form_params) > 0){
                    $data_send['form_params'] = $form_params;
                }
                if(count($form_params_multipart) > 0){
                    unset($data_send['form_params']);
                    $data_send['multipart'] = $form_params_multipart;
                }

                $request = $client->request($method, $end_point, $data_send);
                $response_code = $request->getStatusCode(); // success : 200
                $response = $request->getBody();
                $response_obj = json_decode($response, true); // as array, if use as object use json_decode

                if($response_code == 200){
                    $message = 'Request success';
                    $status = 'success';

                    $is_session_expired = $this->check_session_expire($response_obj);
                }else{
                    $message = 'Request failed. CODE:'.$response_code;
                }
            }
            catch (\GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = 'Request failed : ClientException';
                $response_code = $e->getResponse()->getStatusCode();

                // debug
                \Log::info('Client');
                \Log::info($message);
            }
            catch (\GuzzleHttp\Exception\ServerException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = 'Request failed : ServerException';
                $response_code = $e->getResponse()->getStatusCode();

                // debug
                \Log::info('Server');
                \Log::info($message);
            }
            catch (\GuzzleHttp\Exception\ConnectException $e) {
                $message = $e->getMessage();
                // debug
                \Log::Warning('guzzle_connect_exception', [
                        'message' => $e->getMessage()
                ]);
            }
            catch (\GuzzleHttp\Exception\RequestException $e) {
                $message = $e->getMessage();
                // debug
                \Log::Warning('guzzle_connection_timeout', [
                        'message' => $e->getMessage()
                ]);
            }
        }else{
            $message = 'Unauthorized';
        }

        $data = [
            'status' => $status,
            'response_code' => $response_code,
            'response' => $response,
            'response_obj' => $response_obj,
            'is_session_expired' => $is_session_expired,
            'message' => $message
        ];

        return json_encode($data);
        // return response()->json($data);
    }

    private function check_session_expire($response_obj, $is_api = false) {
        $result = (array_key_exists('result', $response_obj))? $response_obj['result']:false;
        $status_code = (array_key_exists('status_code', $response_obj))? $response_obj['status_code']:404;
        $message = (array_key_exists('message', $response_obj))? $response_obj['message']:"Authorization Token not found";

        if(!$result && $status_code == 404){ // && $message == "Authorization Token not found"
            return true;

            Cache::forever('is_token_expired', 'true');
        }

        Cache::forever('is_token_expired', 'false');
        return false;
    }

    private function check_auth($is_api = false) {
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

use Validator;
use Config;

class LoginController extends Controller
{
    private $base_uri;

    public function __construct()
    {
        $this->base_uri = Config::get('values.base_uri');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access_token = Cache::get('access_token');

        if($access_token){
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()){
            $email = $request->email;
            $password = $request->password;
            $remember = $request->remember;

            $form_params = [
                'email' => $email,
                'password' => $password
            ];

            $headers = [
                'Accept' => 'application/json',
            ];

            $client = new Client(['base_uri' => $this->base_uri]);
            $end_point = '/api';
            $end_point = $end_point .'/loginPartner';

            $is_noexeption = false;
            $is_success_login = false;
            $data_response = [];
            $response_code = 0;
            $status = 'failed';
            $message = '';
            try {
                $request = $client->request('POST', $end_point,[
                    'form_params' => $form_params,
                    'headers' => $headers
                ]);
                $response_code = $request->getStatusCode(); // success : 200
                $response = $request->getBody();
                $response_obj = json_decode($response, true);
                $token = (array_key_exists('access_token', $response_obj))? $response_obj['access_token']:'';
                $token_type = (array_key_exists('token_type', $response_obj))? $response_obj['token_type']:'';
                $expires_in = (array_key_exists('expires_in', $response_obj))? $response_obj['expires_in']:'';
                $user = (array_key_exists('user', $response_obj))? $response_obj['user']:[];
                if(count($user) > 0){
                    $partner_id = (array_key_exists('id', $user))? $user['id']:'';
                    $nama = (array_key_exists('nama', $user))? $user['nama']:'';
                    $alamat = (array_key_exists('alamat', $user))? $user['alamat']:'';
                    $telepon = (array_key_exists('telepon', $user))? $user['telepon']:'';
                }

                if($token){
                    $is_success_login = true;
                }else{
                    $message = $response;
                }

                if($response_code == 200  && $is_success_login){
                    if(!empty($remember) && $remember == 'true'){
                        Cache::forever('access_token', $token);
                        Cache::forever('token_type', $token_type);
                        Cache::forever('partner_id', $partner_id);
                        Cache::forever('nama', $nama);
                        Cache::forever('alamat', $alamat);
                        Cache::forever('telepon', $telepon);
                    }else{
                        if($expires_in){
                            $seconds = $expires_in;
                        }else{
                            $token_timeout = Config::get('values.token_timeout');
                            $seconds = $token_timeout;
                        }

                        Cache::put('access_token', $token, $seconds);
                        Cache::put('token_type', $token_type, $seconds);
                        Cache::put('partner_id', $partner_id, $seconds);
                        Cache::put('nama', $nama, $seconds);
                        Cache::put('alamat', $alamat, $seconds);
                        Cache::put('telepon', $telepon, $seconds);
                    }
                    Cache::forever('is_token_expired', 'false');

                    $status = 'success';
                    $message = 'Successfully login ...';
                }

                $is_noexeption = true;
            }
            catch (\GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = $response;
                $response_code = $e->getResponse()->getStatusCode();

                // debug
                \Log::info('Client');
                \Log::info($message);
            }
            catch (\GuzzleHttp\Exception\ServerException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = $response;
                $response_code = $e->getResponse()->getStatusCode();

                // debug
                \Log::info('Server');
                \Log::info($message);
            }

            $data_response['status'] = $status;
            $data_response['message'] = $message;
            $data_response['response_code'] = $response_code;
            $data_response['is_noexeption'] = $is_noexeption;
            $data_response['is_success_login'] = $is_success_login;

            return response()->json($data_response);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordProcess(Request $request)
    {
        $email = $request->email;

        $form_params = [
            // 'email' => $email
        ];

        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client(['base_uri' => $this->base_uri]);
        $end_point = '/api';
        $end_point = $end_point .'/forgotPassword/'. $email;

        $is_noexeption = false;
        $response_code = 0;
        $data_response = [];
        $status = 'failed';
        $message = '';
        try {
            $request = $client->request('GET', $end_point,[
                'form_params' => $form_params,
                'headers' => $headers
            ]);
            $response_code = $request->getStatusCode();
            $response = $request->getBody();
            $response_obj = json_decode($response, true);

            if($response_code == 200){
                $status = 'success';
                $message = 'Successfully ...';

                if($response_obj['result']){
                    $message = $response_obj['message'];
                }
            }else{
                $message = $response;
            }

            $is_noexeption = true;
        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
            $message = $response;
            $response_code = $e->getResponse()->getStatusCode();
            $message = "Failed to reset password.[0]";

            // debug
            \Log::info('Client');
            \Log::info($message);
        }
        catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
            $message = $response;
            $response_code = $e->getResponse()->getStatusCode();
            $message = "Failed to reset password.[1]";

            // debug
            \Log::info('Server');
            \Log::info($message);
        }
        catch (\GuzzleHttp\Exception\ConnectException $e) {
            $message = "Failed to reset password.[2]";
            \Log::Warning('guzzle_connect_exception', [
                    'message' => $e->getMessage()
            ]);
        }
        catch (\GuzzleHttp\Exception\RequestException $e) {
            $message = "Failed to reset password.[3]";
            \Log::Warning('guzzle_connection_timeout', [
                    'message' => $e->getMessage()
            ]);
        }

        return back()->with($status, $message);

        // $data_response['status'] = $status;
        // $data_response['message'] = $message;
        // $data_response['is_noexeption'] = $is_noexeption;
        // return response()->json($data_response);
    }

    public function logout()
    {
        Cache::forget('access_token');
        Cache::forget('token_type');
        Cache::forget('nama');
        Cache::forget('alamat');
        Cache::forget('telepon');
        Cache::forget('is_token_expired');

        return redirect()->route('login');
    }
}

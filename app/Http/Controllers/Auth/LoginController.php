<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

use Validator;

class LoginController extends Controller
{
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
        $access_token = Cache::get('access_token');

        if($access_token){
            return redirect()->route('hotel');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()){
            $username = $request->username;
            $password = $request->password;
            $remember = $request->remember;

            $form_params = [
                'username' => $username,
                'password' => $password
            ];

            $headers = [
                'Accept' => 'application/json',
            ];

            $client = new Client(['base_uri' => 'http://localhost']);
            $end_point = '/api_passport/public/api/login';

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
                $token = (array_key_exists('token', $response_obj))? $response_obj['token']:'';
                if($token){
                    $is_success_login = true;
                }else{
                    $message = $response;
                }

                if($response_code == 200  && $is_success_login){
                    if(!empty($remember) && $remember == 'true'){
                        Cache::forever('access_token', $token);
                    }else{
                        $token_timeout = \Config::get('values.token_timeout');
                        $seconds = $token_timeout;
                        Cache::put('access_token', $token, $seconds);
                    }

                    $status = 'success';
                    $message = 'Successfully login ...';
                }

                $is_noexeption = true;
            }
            catch (\GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = $response;
            }
            catch (\GuzzleHttp\Exception\ServerException $e) {
                $response = $e->getResponse();
                $response = $response->getBody()->getContents();
                $message = $response;
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
        $username = $request->username;

        $form_params = [
            'username' => $username
        ];

        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client(['base_uri' => 'http://localhost']);
        $end_point = '/api_passport/public/api/forgot-password';

        $is_noexeption = false;
        $data_response = [];
        $status = 'failed';
        $message = '';
        try {
            $request = $client->request('POST', $end_point,[
                'form_params' => $form_params,
                'headers' => $headers
            ]);
            $response_code = $request->getStatusCode();
            $response = $request->getBody();
            $response_obj = json_decode($response, true);

            if($response_code == 200){
                $status = 'success';
                $message = 'Successfully ...';
            }
            $message = $response;

            $is_noexeption = true;
        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
            $message = $response;
        }
        catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
            $message = $response;
        }

        $data_response['status'] = $status;
        $data_response['message'] = $message;
        $data_response['is_noexeption'] = $is_noexeption;

        return back()->with('success','Submited');

        return response()->json($data_response);
    }

    public function logout()
    {
        Cache::forget('access_token');

        return redirect()->route('login');
    }
}

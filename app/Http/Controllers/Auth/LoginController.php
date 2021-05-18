<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

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
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember;

        $form_params = [
            'email' => $username,
            'password' => $password
        ];

        // $token = "";
        $headers = [
            // 'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];

        $client = new Client(['base_uri' => 'http://localhost']);

        $is_noexeption = false;
        try {
            $request = $client->request('POST', '/api_passport/public/api/login',[
                'form_params' => $form_params,
                'headers' => $headers
            ]);
            $response_code = $request->getStatusCode(); // success : 200
            $response = $request->getBody();
            $response_obj = json_decode($response, true);
            $token = $response_obj['token'];

            $is_noexeption = true;
        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
        }
        catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();
            $response = $response->getBody()->getContents();
        }

        return $response;
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordProcess(Request $request)
    {
        $username = $request->username;
        dd($request->all());
    }

    public function logout()
    {
    }
}

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

        $client = new Client(['base_uri' => 'https://reqres.in/']);

        $response = $client->request('GET', '/api/users?page=1');
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

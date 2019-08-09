<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use App\Client;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIController extends Controller
{
    public function __construct()
    {
        \Config::set('jwt.user', 'App\Client');
        \Config::set('auth.providers.users.model', \App\Client::class);
        $this->middleware('jwt.auth', ['except' => ['login', 'register']]);
    }
   
    public function login(Request $request)
    {


        $credentials = $request->only('email', 'password');
        $credentials = array_add($credentials, 'secret_key', $request->secret_key);
        try {
            \Config::set('jwt.user', 'App\Client');
            \Config::set('auth.providers.users.model', \App\Client::class);
            if (!$token = JWTAuth::attempt($credentials)) {
                $data = [
                    "error" => true,
                    "message" => "Invalid credentials",
                    "dateTime" => Carbon::now()
                ];
                return response()->json($data);
            }
        } catch (JWTException $e) {
            $data = [
                "error" => true,
                "message" => 'Could not Authenticate',
                "dateTime" => Carbon::now()
            ];
            return response()->json($data, 500);
        }
        $user = auth()->user();
        $data = [
            "error" => false,
            "token" => $token,
            "message" => 'Signed in Successfully',
            "user" => $user,
            "dateTime" => Carbon::now()
        ];
        return response()->json($data);
    }

   


}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $input = $request->only('email', 'first_name', 'last_name', 'password');

        $validator = validator($input, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'status' => 400,
                    'description' => 'One or more validation errors occured.',
                    'fields' => $validator->errors()->all()
                ]
            ], 400);
        }

        User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $client = Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $input['email'],
            'password' => $input['password'],
            'scope' => null,
        ]);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $input = $request->only('username', 'password');

        $client = Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $input['username'],
            'password' => $input['password'],
            'scope' => null
        ]);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user('api')->token()->revoke();

        return response()->json([
            'data' => null
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = Auth::user();
        return response()->json(['data' => $user]);
    }
}

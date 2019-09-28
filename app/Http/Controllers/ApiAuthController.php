<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Redirect;

use App\Structure\Answer_post;


class ApiAuthController
{

    public function registrate(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:users',
                'email' => 'required|unique:users|email:rfc',
                'password' => 'required'
            ]
        );

        if ($validator->fails()) {
            $errors = collect($validator->errors()->toArray())->map(function ($error) {
                return $error[0];
            });

            $body = ['status' => false, 'message' => $errors];
            return (new Response($body, 200))->header('status text', 'Creating error')->header('status code', 400);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->remember_token = md5(time() . $request->email);

        $user->save();

        return response()->json(['status' => true, 'token' => $user->remember_token]);
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => ['email' => 'user not found']]);
        }

        if (md5($request->password) != $user->password) {
            return response()->json(['status' => false, 'message' => ['email' => 'bad password']]);
        }

        $user->remember_token = md5(time() . $request->email);
        $user->save();

        return response()->json(['status' => true, 'token' => $user->remember_token]);

    }

    public function logout(Request $request)
    {

        $user = User::where('remember_token', $request->token)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => ['email' => 'user not found']]);
        }

        $user->remember_token = md5(time() . $request->email);
        $user->save();

        return response()->json(['status' => true]);
    }

}

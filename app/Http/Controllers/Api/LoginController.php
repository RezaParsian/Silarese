<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Register(UserRequest $request)
    {
        $request["password"]=Hash::make($request->password);
        $user=User::create($request->all());
        return [
            "id"=>$user->id,
            "name"=>$user->name,
            "email"=>$user->email
        ];
    }

    public function Login(UserRequest $request)
    {
        if (Auth::attempt($request->all())) {
            $result=Auth::user()->toArray();
            $result["token"]=Auth::user()->createToken("silarec")->accessToken;
            return [
                "id"=>$result['id'],
                "name"=>$result['name'],
                "email"=>$result['email'],
                "token"=>$result['token'],
            ];
        }else{
            abort(403,"Email or password is wrong");
        }
    }
}

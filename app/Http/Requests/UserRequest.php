<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule=[];
        if (Request()->is("api/register")) {
            $rule=[
                "name"=>"required|string|min:5",
                "email"=>"required|email|unique:users,email",
                "password"=>"required"
            ];
        }else if(Request()->is("api/login")){
            $rule=[
                "email"=>"required|email",
                "password"=>"required"
            ];
        }

        return $rule;
    }
}

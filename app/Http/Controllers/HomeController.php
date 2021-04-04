<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $q="%".Request()->search."%";
        $users=User::where("name","like",$q)->orwhere("email","like",$q)->orderby("id","desc")->paginate();
        return view('dashboard.dashboard',compact("users"));
    }
}

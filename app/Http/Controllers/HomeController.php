<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\{Foundation\Application, Support\Renderable, View\Factory, View\View};
use Illuminate\Http\RedirectResponse;

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
     * @return Renderable
     */
    public function index(): Renderable
    {
        $q = "%" . Request()->search . "%";
        $users = User::where("name", "like", $q)->orwhere("email", "like", $q)->orderby("id", "desc")->paginate();
        return view('dashboard.dashboard', compact("users"));
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        $userInfo = $user->userInfo()->orderBy("id", "desc")->paginate();
        return view("dashboard.user", compact("userInfo"));
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function change(User $user): RedirectResponse
    {
        $role = $user->role == "admin" ? "user" : "admin";
        $user->update(["role" => $role]);
        return back()->with("msg", "مقام کاربر با موفقیت تغیر یافت");
    }
}

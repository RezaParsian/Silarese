<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function store(Request $request): array
    {
        $request->validate([
            Profile::IS_MALE => ["required"],
            Profile::HEIGHT => ["required"],
            Profile::WEIGHT => ["required"],
            Profile::AGE => ["required"],
            Profile::SITDAILY => ["required"],
            Profile::BACKPAIN => ["required"],
            Profile::POSTURE => ["required"],
        ]);

        Profile::updateOrCreate([Profile::USER_ID => Auth::id()], [
            Profile::USER_ID => Auth::id(),
            Profile::IS_MALE => $request->input(Profile::IS_MALE),
            Profile::HEIGHT => $request->input(Profile::HEIGHT),
            Profile::WEIGHT => $request->input(Profile::WEIGHT),
            Profile::AGE => $request->input(Profile::AGE),
            Profile::SITDAILY => $request->input(Profile::SITDAILY),
            Profile::BACKPAIN => $request->input(Profile::BACKPAIN),
            Profile::POSTURE => $request->input(Profile::POSTURE),
        ]);


        return [
            "status" => "success",
            "user" => array_merge(Auth::user()->toArray(), Auth::user()->profile->toArray()),
        ];
    }

    public function mac(Request $request): array
    {
        $request->validate([
            Profile::MAC => ["required","unique:profiles,mac,".Auth::id()]
        ]);

        $profile=Profile::find(Auth::id());

        $profile->update([
            Profile::MAC => $request->input(Profile::MAC)
        ]);

        return [
            "status" => "success",
            "message" => "This mac address is belongs to you."
        ];
    }
}

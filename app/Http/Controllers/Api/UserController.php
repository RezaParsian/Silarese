<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function GetUserLog()
    {
        return UserInfo::where("user_id",Auth::id())->orderby("id","desc")->limit(30)->get();
    }

    public function SaveUserLog(Request $request)
    {
        $data=json_decode($request->getContent(),true);
        foreach ($data as $req) {
            $new_date = $this->DateToUtc($req["date"], $req["timezone"]);
            $userinfo = UserInfo::updateOrCreate(["date" => $new_date,"user_id"=>Auth::id()], [
                "user_id" => Auth::id(),
                "upright" => $req["upright"],
                "slouched" => $req["slouched"],
                "date" => $new_date,
                "user_date" => $req['date'],
                "timezone" => $req["timezone"],
            ]);
        }

        return ["msg"=>count($data)." row has been inserted"];
    }


    private function DateToUtc($date, $timezone)
    {
        $given = new DateTime($date, new DateTimeZone($timezone));
        $given->setTimezone(new DateTimeZone("UTC"));
        $output = $given->format("Y-m-d H:i:s");
        return ($output);
    }
}

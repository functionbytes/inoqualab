<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function set_user_session($user, $token, $route)
    {

        session()->put('fullname', $user->fullname);
        session()->put('firstname', $user->firstname);
        session()->put('lastname', $user->lastname);
        session()->put('profile_image', $user->profile_image);
        session()->put('slack', $user->slack);
        session()->put('user_id', $user->id);
        session()->put('role', $user->role_id);    
        session()->put('route', $route);     
        session()->put('access_token', $token);
        //Session::save();
    }

    
    public function check_user_session($user, $token)
    {
        $user_slack = session('slack');
        if($user_slack != ""){
            return true;
        }else{
            return false;
        }
    }

    public static function generate_numbers($table)
    {
        $exist = DB::table($table)->get();

        if ($exist->count() >= 1) {
            $exist = DB::table($table)->max("id");
            return $exist + 1;
        } else {
            return  1;
        }
    }

    public static function generate_number($table)
{
    $year = Carbon::now()->format('Y');

    // Obtener el último registro del año actual
    $lastNumber = DB::table($table)
        ->whereYear('created_at', $year)
        ->max(DB::raw("CAST(SUBSTRING_INDEX(number, '-', -1) AS UNSIGNED)"));

    return $lastNumber ? $lastNumber + 1 : 1;
}


    function generate_slack($table)
    {
        do{
            $slack = Str::random(28);
            $exist = DB::table($table)->where("slack", $slack)->first();
        }while($exist);
        return $slack;
    }
    
    function generate_petition($table)
    {
        do{
            $slack = Str::random(8);
            $exist = DB::table($table)->where("slack", $slack)->first();
        }while($exist);
        return $slack;
    }

}

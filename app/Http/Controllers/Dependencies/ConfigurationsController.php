<?php

namespace App\Http\Controllers\Dependencies;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuration;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Mediable;

use App\Models\User;
use App\Models\Profile;
use App\Models\Utilities;
use App\Http\Requests;


class ConfigurationsController extends Controller
{

    public function index(){

        $user = User::auth();

        return view('dependencies.views.configurations.edit')->with([
            'user' => $user,
        ]);


    }

    public function update(Request $request){

        $user = User::auth();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->cellphone = $request->cellphone;
        $user->charge = $request->charge;
        $user->email =$request->email;

        if($request->password!=null){
            $user->password = $request->password;
        }

        $user->updated_at = new \DateTime();
        $user->save();

        return redirect()->route('dependencie.configurations')->withSuccess(__('users.updated'));



    }

}

<?php

namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuration;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Mediable;

use App\Models\Utilities;
use App\Http\Requests;


class ConfigurationsController extends Controller
{

    public function index(){


        $configuration = Configuration::all()->first();


        return view('managers.views.configurations.edit')->with([
            'configuration' => $configuration,
        ]);

    }

    public function update(Request $request){

        $configuration = Configuration::all()->first();
        $configuration->label = $request->label;
        $configuration->email = $request->email;
        $configuration->phone =$request->phone;
        $configuration->optional =$request->optional;
        $configuration->cellphone =$request->cellphone;
        $configuration->ext =$request->ext;
        $configuration->address =$request->address;
        $configuration->weekend =$request->weekend;
        $configuration->weekday = $request->weekday;
        $configuration->film =$request->film;
        $configuration->instructive =$request->instructive;
        $configuration->maps =$request->maps;
        $configuration->facebook =$request->facebook;
        $configuration->instagram = $request->instagram;
        $configuration->url = $request->url;
        $configuration->description =$request->description;
        $configuration->politics =$request->politics;
        $configuration->terms =$request->terms;
        $configuration->updated_at = new \DateTime();
        $configuration->save();


        return redirect()->route('manager.dashboard');


    }


}

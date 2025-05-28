<?php

namespace App\Http\Controllers\Managers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Mediable;
use App\Models\Media;

use App\Models\User;
use App\Models\Petition;
use App\Models\Tracing;
use App\Models\Utilities;

class TracingsController extends Controller
{

    public function store(Request $request){

        $petition = Petition::slack($request->petition);
        $user = User::auth();

        if($request->observation!=null){

            $tracing = new Tracing;
            $tracing->slack = $this->generate_slack("tracings");
            $tracing->observation = $request->observation;
            $tracing->petition_id = $petition->id;
            $tracing->user_id  = $user->id;
            $tracing->save();

            if ($request->hasFile('document')) {
                $thumbnail = $request->file('document');
                $thumbnail_name = $thumbnail->getClientOriginalName();
                $thumbnail_ext = $thumbnail->getClientOriginalExtension();
                $thumbnail_path = $thumbnail->getRealPath();
                $blend = Utilities::random();
                $hash = hash('ripemd160' ,$blend);
                $thumbnail_dir = '/tracings'.'/';
                $new_thumbnail= $hash.".".$thumbnail_ext;
                $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail,'public');
                $tracing->storeAndSetDocument($thumbnail , $new_thumbnail);
            }

            $tracing->save();

        }



        $tracings = Tracing::petitions($petition->id);

        $response = array(
            'tracings' => $tracings,
            'user' => $user
        );

        return view('managers.partials.sections.tracings')->with($response);

    }

    public function destroy($token){

        $user = User::auth();
        $tracing = Tracing::slack($token);
        $petition = $tracing->petition_id;
        $tracing->delete();

        $tracings = Tracing::petitions($petition);

        $response = array(
            'tracings' => $tracings,
            'user' => $user
        );

        return view('managers.partials.sections.tracings')->with($response);

    }

}

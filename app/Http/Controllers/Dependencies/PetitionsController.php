<?php

namespace App\Http\Controllers\Dependencies;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Mediable;


use Illuminate\Support\Facades\Mail;
use App\Mail\Petitions\AnswerMails;

use App\Models\Utilities;
use App\Models\Petition;
use App\Models\Report;
use App\Models\Tracing;
use App\Models\Status;
use App\Models\Type;
use App\Models\Prioritie;
use App\Models\Dependencie;
use App\Models\User;

class PetitionsController extends Controller
{


    public function view($token){

        $petition = Petition::token($token);
        $reports = Report::petitions($petition->id);
        $tracings = Tracing::petitions($petition->id);
        //Mail::send(new PaymentsMails($order));

        return view('dependencies.views.petitions.view')->with([
            'petition' => $petition,
            'reports' => $reports,
            'tracings' => $tracings,
        ]);

    }

    public function report($token){

        $petition = Petition::token($token);
        $reports = Report::petitions($petition->id);
        $tracings = Tracing::petitions($petition->id);

        if ($petition->documents()!=null){
            $urldocuments = $petition->documents()->filename;
        }else{
            $urldocuments = "";
        }

        if ($petition->answers()!=null){
            $urlanswers = $petition->answers()->filename;
        }else{
            $urlanswers = "";
        }

        return view('dependencies.views.petitions.report')->with([
            'petition' => $petition,
            'reports' => $reports,
            'tracings' => $tracings,
            'urlanswers' => $urlanswers,
            'urldocuments' => $urldocuments,
        ]);

    }

    public function edit($token){

        $petition = Petition::token($token);

        $statu  =  $petition->status_id;
        $type  =  $petition->type_id;
        $dependencie  =  $petition->dependencie_id;
        $prioritie  =  $petition->prioritie_id;

        $reports = Report::petitions($petition->id);

        $dependencies = Dependencie::latest()->get();
        $dependencies = $dependencies->pluck('title','id');

        $types = Type::latest()->get();
        $types = $types->pluck('title','id');

        $priorities = Prioritie::latest()->get();
        $priorities = $priorities->pluck('title','id');

        $status = Status::latest()->get();
        $status = $status->pluck('title','id');

        if ($petition->documents()!=null){
            $urldocuments = $petition->documents()->filename;
        }else{
            $urldocuments = "";
        }

        if ($petition->answers()!=null){
            $urlanswers = $petition->answers()->filename;
        }else{
            $urlanswers = "";
        }

        return view('dependencies.views.petitions.edit')->with([
            'petition' => $petition,
            'dependencies' => $dependencies,
            'dependencie' => $dependencie,
            'priorities' => $priorities,
            'prioritie' => $prioritie,
            'reports' => $reports,
            'types' => $types,
            'type' => $type,
            'status' => $status,
            'statu' => $statu,
            'urldocuments' => $urldocuments,
            'urlanswers' => $urlanswers,
        ]);


    }

    public function update(Request $request , $token){

        $user = User::auth();
        $petition = Petition::token($token);
        $petition->response = $request->response;
        $petition->status_id = $request->status;
        $petition->prioritie_id = $request->prioritie;
        $petition->updated_at = new \DateTime();
        $petition->save();

        if ($request->hasFile('answers')) {
            $thumbnail = $request->file('answers');
            $thumbnail_name = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_path = $thumbnail->getRealPath();
            $blend = Utilities::random();
            $hash = hash('ripemd160' ,$blend);
            $thumbnail_dir = '/answers'.'/';
            $new_thumbnail= $hash.".".$thumbnail_ext;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail,'public');
            $petition->storeAndSetAnswers($thumbnail , $new_thumbnail);
        }

        if($petition->send == 0 ){
            if($petition->status_id == 3 ){
                Mail::send(new AnswerMails($petition));
                $petition->send = 1;
                $petition->save();

            }
        }

        $report = new Report;
        $report->token = Report::generate();
        $report->petition_id = $petition->id;
        $report->status_id = $request->status;
        $report->user_id = $user->id;
        $report->save();


        return redirect()->route('dependencie.dashboard')->withSuccess(__('petitions.updated'));


    }

    public function destroy($token){
        $petition = Petition::token($token);
        $petition->destroy();
        return redirect()->route('dependencie.dashboard');
    }

    public function tracing($token){

        $petition = Petition::token($token);
        $user = User::auth();
        $tracings = Tracing::petitions($petition->id);

        return view('dependencies.views.petitions.tracing')->with([
            'petition' => $petition,
            'user' => $user,
            'tracings' => $tracings,
        ]);


    }



    public function search(Request $request){

        $user = User::auth();
        $dependencie = $user->dependencie_id;


        if($request->search == ""){
            $alls = Petition::dependencies($dependencie);
            $pendings = Petition::filters($dependencie,1);
            $process = Petition::filters($dependencie,2);
            $finisheds = Petition::filters($dependencie,3);
            $solutions = Petition::filters($dependencie,4);
        }else{
            $search = $request->search;
            $alls = Petition::searchDependencieAll($search,$dependencie);
            $pendings = Petition::searchDependencieStatus($search,$dependencie,1);
            $process = Petition::searchDependencieStatus($search,$dependencie,2);
            $finisheds = Petition::searchDependencieStatus($search,$dependencie,3);
            $solutions = Petition::searchDependencieStatus($search,$dependencie,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );

        return view('dependencies.partials.sections.contents')->with($response);

    }


    public function searchActions(Request $request){

        $user = User::auth();
        $dependencie = $user->dependencie_id;

        if($request->search == ""){
            $alls = Petition::dependencies($dependencie);
            $pendings = Petition::filters($dependencie,1);
            $process = Petition::filters($dependencie,2);
            $finisheds = Petition::filters($dependencie,3);
            $solutions = Petition::filters($dependencie,4);
        }else{
            $search = $request->search;
            $alls = Petition::searchDependencieAll($search,$dependencie);
            $pendings = Petition::searchDependencieStatus($search,$dependencie,1);
            $process = Petition::searchDependencieStatus($search,$dependencie,2);
            $finisheds = Petition::searchDependencieStatus($search,$dependencie,3);
            $solutions = Petition::searchDependencieStatus($search,$dependencie,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );



        return view('dependencies.partials.sections.actions')->with($response);

    }



}

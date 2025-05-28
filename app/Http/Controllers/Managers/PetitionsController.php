<?php

namespace App\Http\Controllers\Managers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Mediable;


use Illuminate\Support\Facades\Mail;
use App\Mail\Petitions\AnswerMails;
use App\Mail\Petitions\ClosetMails;
use App\Mail\Petitions\ProcessMails;
use App\Mail\Petitions\SolutionsMails;
use App\Mail\Petitions\ResponseMails;


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

    public function index(){

         $alls = Petition::latest()->get();


         $pendings = Petition::statu(1);
         $process = Petition::statu(2);
         $finisheds = Petition::statu(3);
         $solutions = Petition::statu(4);

         $dependencies = Dependencie::latest()->get();
         $dependencies = $dependencies->pluck('label','id');
         $dependencies->prepend('Todas','0');

        return view('managers.views.petitions.index')->with([
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'dependencies' => $dependencies,
            'solutions' => $solutions,
        ]);
    }


    public function view($slack){

        $petition = Petition::slack($slack);
        $reports = Report::petitions($petition->id);
        $tracings = Tracing::petitions($petition->id);
        //Mail::send(new PaymentsMails($order));

        return view('managers.views.petitions.view')->with([
            'petition' => $petition,
            'reports' => $reports,
            'tracings' => $tracings,
        ]);

    }


    public function edit($slack){

        $petition = Petition::slack($slack);

        $statu  =  $petition->status_id;
        $type  =  $petition->type_id;
        $dependencie  =  $petition->dependencie_id;
        $prioritie  =  $petition->prioritie_id;

        $reports = Report::petitions($petition->id);

        $dependencies = Dependencie::latest()->get();
        $dependencies = $dependencies->pluck('label','id');

        $types = Type::latest()->get();
        $types = $types->pluck('label','id');

        $priorities = Prioritie::latest()->get();
        $priorities = $priorities->pluck('label','id');

        $status = Status::latest()->get();
        $status = $status->pluck('label','id');

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

        return view('managers.views.petitions.edit')->with([
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


    public function update(Request $request , $slack){


        $user = User::auth();
        $petition = Petition::slack($slack);
        $petition->response = $request->response;
        $petition->status_id = $request->status;
        $petition->prioritie_id = $request->prioritie;
        $petition->updated_at = new \DateTime();
        $petition->save();

       
        
        if($petition->status_id == 4 ){
            Mail::send(new ClosetMails($petition));
            $petition->send = 1;
            $petition->save();
        }elseif($petition->status_id == 2 ){
            Mail::send(new ProcessMails($petition));
            $petition->send = 1;
            $petition->save();
        }elseif($petition->status_id == 3 ){

            if ($request->hasFile('answers')) {
                $thumbnail = $request->file('answers');
                $thumbnail_name = $thumbnail->getClientOriginalName();
                $thumbnail_ext = $thumbnail->getClientOriginalExtension();
                $thumbnail_path = $thumbnail->getRealPath();
                $blend = Utilities::random();
                $hash = hash('ripemd160', $blend);
                $thumbnail_dir = '/answers';
                $new_thumbnail = $hash . "." . $thumbnail_ext;
                $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
                $petition->storeAndSetAnswers($thumbnail, $new_thumbnail);
            }


            Mail::send(new SolutionsMails($petition));
            $petition->send = 1;
            $petition->save();
        }
        

        $report = new Report;
        $report->slack = $this->generate_slack('reports');
        $report->petition_id = $petition->id;
        $report->status_id = $request->status;
        $report->user_id = $user->id;
        $report->save();


        return redirect()->route('manager.petitions')->withSuccess(__('petitions.updated'));


    }


    public function destroy($slack){
        $petition = Petition::slack($slack);
        $petition->delete();
        return redirect()->route('manager.petitions');
    }


    public function tracing($slack){

        $petition = Petition::slack($slack);
        $user = User::auth();
        $tracings = Tracing::petitions($petition->id);

        return view('managers.views.petitions.tracing')->with([
            'petition' => $petition,
            'user' => $user,
            'tracings' => $tracings,
        ]);


    }

    public function filters(Request $request){


        if($request->dependencie == "0"){
            $alls = Petition::latest()->get();
            $pendings = Petition::statu(1);
            $process = Petition::statu(2);
            $finisheds = Petition::statu(3);
            $solutions = Petition::statu(4);
        }else{
            $dependencie = $request->dependencie;
            $alls = Petition::dependencies($dependencie);
            $pendings = Petition::filters($dependencie,1);
            $process = Petition::filters($dependencie,2);
            $finisheds = Petition::filters($dependencie,3);
            $solutions = Petition::filters($dependencie,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );

        return view('managers.partials.sections.contents')->with($response);

    }


    public function search(Request $request){

        if($request->search == ""){
            $alls = Petition::latest()->get();
            $pendings = Petition::statu(1);
            $process = Petition::statu(2);
            $finisheds = Petition::statu(3);
            $solutions = Petition::statu(4);
        }else{
            $search = $request->search;
            $alls = Petition::searchAll($search);
            $pendings = Petition::searchStatus($search,1);
            $process = Petition::searchStatus($search,2);
            $finisheds = Petition::searchStatus($search,3);
            $solutions = Petition::searchStatus($search,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );

        return view('managers.partials.sections.contents')->with($response);

    }


    public function searchActions(Request $request){

        if($request->search == ""){
            $alls = Petition::latest()->get();
            $pendings = Petition::statu(1);
            $process = Petition::statu(2);
            $finisheds = Petition::statu(3);
            $solutions = Petition::statu(4);
        }else{
            $search = $request->search;
            $alls = Petition::searchAll($search);
            $pendings = Petition::searchStatus($search,1);
            $process = Petition::searchStatus($search,2);
            $finisheds = Petition::searchStatus($search,3);
            $solutions = Petition::searchStatus($search,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );



        return view('managers.partials.sections.actions')->with($response);

    }



    public function actions(Request $request){


        if($request->dependencie == "0"){
            $alls = Petition::latest()->get();
            $pendings = Petition::statu(1);
            $process = Petition::statu(2);
            $finisheds = Petition::statu(3);
            $solutions = Petition::statu(4);
        }else{
            $dependencie = $request->dependencie;
            $alls = Petition::dependencies($dependencie);
            $pendings = Petition::filters($dependencie,1);
            $process = Petition::filters($dependencie,2);
            $finisheds = Petition::filters($dependencie,3);
            $solutions = Petition::filters($dependencie,4);
        }

        $response = array(
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        );

        return view('managers.partials.sections.actions')->with($response);

    }


}

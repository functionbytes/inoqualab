<?php

namespace App\Http\Controllers\Dependencies;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;

use Analytics;
use Carbon\Carbon;
use App\Models\Petition;
use App\Models\User;

class DashboardController extends Controller
{

    public function dashboard(){

        $user = User::auth();
        $dependencie = $user->dependencie_id;

        $alls = Petition::dependencies($dependencie);
        $pendings = Petition::filters($dependencie,1);
        $process = Petition::filters($dependencie,2);
        $finisheds = Petition::filters($dependencie,3);
        $solutions = Petition::filters($dependencie,4);

        return view('dependencies.views.dashboard.index')->with([
            'alls' => $alls,
            'process' => $process,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
        ]);

    }

}

<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;

use Analytics;
use Carbon\Carbon;
use App\Models\Petition;

class KanbanController extends Controller
{


    public function index(){

        return view('managers.views.kanban.index')->with([
        ]);
    }


}

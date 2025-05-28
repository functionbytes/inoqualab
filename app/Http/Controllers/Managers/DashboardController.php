<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\Scheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;

use Analytics;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Canal;
use App\Models\User;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Petition;
use App\Models\Dependencie;
use App\Models\Partner;

class DashboardController extends Controller
{

    public function dashboard(){



        $alls = Petition::latest()->get();
        $pendings = Petition::statu(1);
        $process = Petition::statu(2);
        $finisheds = Petition::statu(3);
        $solutions = Petition::statu(4);
        $items = Petition::statu(1)->take(5);

        $blogs = Blog::latest()->get();
        $canals = Canal::latest()->get();
        $users = User::latest()->get();
        $contacts = Contact::latest()->get();
        $applications = Application::latest()->get();
        $dependencies = Dependencie::latest()->get();
        $partners = Partner::latest()->get();

        $schemes = Scheme::latest()->get();
        $publications = Publication::latest()->get();

        return view('managers.views.dashboard.index')->with([
            'alls' => $alls,
            'process' => $process,
            'schemes' => $schemes,
            'publications' => $publications,
            'pendings' => $pendings,
            'finisheds' => $finisheds,
            'solutions' => $solutions,
            'items' => $items,
            'blogs' => $blogs,
            'canals' => $canals,
            'users' => $users,
            'contacts' => $contacts,
            'applications' => $applications,
            'dependencies' => $dependencies,
            'partners' => $partners,
        ]);
    }

}

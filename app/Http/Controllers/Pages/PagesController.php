<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\Partner;

class PagesController extends Controller
{



    public function home(){
        $user  = User::auth();

        if($user){
            $profile = $user->profile->label;

            switch ($profile){
                case 'Managers' :
                    return redirect()->route('manager.dashboard')->withErrors(__('auth.not_authorized'));
                    break;
            }

        }else{
            return redirect()->route('index');
        }

}


    public function index(){
        $blogs = Blog::available()->orderBy('created_at', 'desc')->get()->take(3);
        $partners = Partner::available()->orderBy('position', 'desc')->get();
        $testimonials = Testimonial::available()->get();
        $sliders = Slider::available()->get();
        $services = Service::available()->get();

        return view('pages.views.index')->with([
            'testimonials' => $testimonials,
            'partners' => $partners,
            'services' => $services,
            'sliders' => $sliders,
            'blogs' => $blogs,
        ]);

    }


    public function system(){

        return view('pages.views.system')->with([
        ]);

    }



    public function abouts(){

        $partners = Partner::available()->get();
        return view('pages.views.abouts')->with([
            'partners' => $partners,
        ]);

    }


    public function aggregates(){

        return view('pages.views.aggregates')->with([
        ]);

    }

    
    public function terms(){

        return view('pages.views.terms')->with([
        ]);

    }
    public function politics(){

        return view('pages.views.politics')->with([
        ]);

    }
    public function petitions(){

        return view('pages.views.petitions')->with([
        ]);

    }
    
    public function faqs(){

        return view('pages.views.faqs')->with([
        ]);

    }


}

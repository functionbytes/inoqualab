<?php

namespace App\Http\Controllers\Managers;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Mediable;

use App\Models\Utilities;
use App\Models\Testimonial;


class TestimonialsController extends Controller
{

    public function index(){

        $testimonials = Testimonial::latest()->get();

        return view('managers.views.testimonials.index')->with([
          'testimonials' => $testimonials,
        ]);
    }


    public function create(){


        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');
        return view('managers.views.testimonials.create')->with([
            'availables' => $availables,
        ]);

    }

    public function storage(Request $request){

            $testimonial = new Testimonial;
            $testimonial->slack = $this->generate_slack("testimonials");
            $testimonial->names = $request->names;
            $testimonial->charger = $request->charger;
            $testimonial->description = $request->description;
            $testimonial->save();

            return redirect()->route('manager.testimonials');


    }

    public function edit($slack){

        $testimonial = Testimonial::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');


        return view('managers.views.testimonials.edit')->with([
            'testimonial' => $testimonial,
            'availables' => $availables,



        ]);

    }

    public function update(Request $request,$slack){

        $testimonial = Testimonial::slack($slack);
        $testimonial->names = $request->names;
        $testimonial->charger = $request->charger;
        $testimonial->description = $request->description;
        $testimonial->available = $request->available;
        $testimonial->updated_at = new \DateTime();
        $testimonial->save();

        return redirect()->route('manager.testimonials');

    }


    public function destroy($slack){


        $testimonial = Testimonial::slack($slack);
        $testimonial->delete();

        return redirect()->route('manager.testimonials');
    }





}

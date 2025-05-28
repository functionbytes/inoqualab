<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Media;
use App\Models\Utilities;


class SlidersController extends Controller
{


    public function index()
    {

        $sliders = Slider::get();

        return view('managers.views.sliders.index')->with([
            'sliders' => $sliders,
        ]);
    }


    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        return view('managers.views.sliders.create')->with([
            'availables' => $availables,

        ]);
    }

    public function store(Request $request)
    {


        $slider = new Slider;
        $slider->slack = $this->generate_slack("sliders");;
        $slider->label = $request->label;
        $slider->description = $request->description;
        $slider->url = $request->url;
        
        if($request->available != null){
            $slider->available = 1;
        }else{
            $slider->available = 0;
        }

        $slider->save();

        return response()->json($slider->slack);
    }

    public function edit($slack)
    {

        $slider = Slider::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');


        if ($slider->thumbnail() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }


        return view('managers.views.sliders.edit')->with([
            'slider' => $slider,
            'thumbnail' => $thumbnail,
            'availables' => $availables,

        ]);

        
    }

    public function update(Request $request, $slack)
    {
        $slider = Slider::slack($slack);
        $slider->label = $request->label;
        $slider->description = $request->description;
        $slider->url = $request->url;
        
        if($request->available != null){
            $slider->available = 1;
        }else{
            $slider->available = 0;
        }

        $slider->updated_at = new \DateTime();
        $slider->save();

        return response()->json($slider->slack);
        
    }




    public function getThumbnail($slack)
    {

        $slider = Slider::slack($slack);

        if ($slider->thumbnail() != null) {

            $thumbnail = $slider->thumbnail();

            $images[] = [
                'name' => $thumbnail->original_filename,
                'id' => $thumbnail->id,
                'file' => $thumbnail->filename,
                'file_size' =>  $thumbnail->file_size
            ];

            return response()->json($images);


        } else {

            $thumbnail = null;
            $images = [];

            return response()->json($images);
        }
    }

    public function storeThumbnail(Request $request)
    {

        if ($request->file('file')) {
            
            $slider = Slider::slack($request->slider);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/sliders' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $slider->storeAndSetThumbnail($new_thumbnail, $thumbnail_name, $thumbnail_size);

            return response()->json(['status' => "success", 'slider' => $slider->slack]);
        }
    }


    public function deleteThumbnail($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/sliders' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/sliders' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }


    public function destroy($slack)
    {

        $slider = Slider::slack($slack);
        $slider->delete();

        return redirect()->route('manager.sliders');
    }
}
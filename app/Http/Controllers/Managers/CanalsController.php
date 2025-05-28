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
use App\Models\Canal;
use App\Models\Media;
use App\Models\Utilities;

class CanalsController extends Controller
{


    public function index()
    {

        $canals = Canal::get();

        return view('managers.views.canals.index')->with([
            'canals' => $canals,
        ]);
    }


    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        return view('managers.views.canals.create')->with([
            'availables' => $availables,

        ]);
    }

    public function store(Request $request)
    {


        $canal = new Canal;
        $canal->slack = $this->generate_slack("canals");
        $canal->label = $request->label;
        $canal->agent = $request->agent;
        $canal->cellphone = $request->cellphone;
        $canal->phone = $request->phone;
        $canal->email = $request->email;
        $canal->ext = $request->ext;
        $canal->available = $request->available;
        $canal->save();

        return response()->json($canal->slack);
        
    }

    public function edit($slack)
    {

        $canal = Canal::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');


        if ($canal->thumbnail() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }

        return view('managers.views.canals.edit')->with([
            'canal' => $canal,
            'thumbnail' => $thumbnail,
            'availables' => $availables,

        ]);

        
    }

    public function update(Request $request, $slack)
    {
        $canal = Canal::slack($slack);
        $canal->label = $request->label;
        $canal->agent = $request->agent;
        $canal->cellphone = $request->cellphone;
        $canal->phone = $request->phone;
        $canal->ext = $request->ext;
        $canal->email = $request->email;
        $canal->available = $request->available;
        $canal->updated_at = new \DateTime();
        $canal->save();

        return response()->json($canal->slack);
    }



    public function getThumbnail($slack)
    {

        $canal = Canal::slack($slack);

        if ($canal->thumbnail() != null) {

            $thumbnail = $canal->thumbnail();

            $images[] = [
                'name' => $thumbnail->original_filename,
                'id' => $thumbnail->id,
                'file' => $thumbnail->filename,
                'size' =>  $thumbnail->file_size
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


            $canal = Canal::slack($request->canal);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/canals' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $canal->storeAndSetThumbnail($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'canal' => $canal->slack]);
        }
    }


    public function deleteThumbnail($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/canals' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/canals' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }

    
    public function destroy($slack)
    {

        $canal = Canal::slack($slack);
        $canal->delete();

        return redirect()->route('manager.canals');
    }
}
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
use App\Models\Publication;
use App\Models\Section;
use App\Models\Media;
use App\Models\Utilities;

class PublicationsController extends Controller
{

    public function index()
    {

        $publications = Publication::get();

        return view('managers.views.publications.index')->with([
            'publications' => $publications,
        ]);
    }


    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        $sections = Section::latest()->get();
        $sections->prepend('', '');
        $sections = $sections->pluck('label', 'id');


        return view('managers.views.publications.create')->with([
            'sections' => $sections,
            'availables' => $availables,

        ]);
    }

    public function store(Request $request)
    {

        $publication = new Publication;
        $publication->slack = $this->generate_slack("publications");
        $publication->sublabel = $request->sublabel;
        $publication->label = $request->label;
        $publication->description = $request->description;
        $publication->section_id = $request->section;
        $publication->available = $request->available;
        $publication->save();

        return response()->json($publication->slack);
        
    }

    public function edit($slack)
    {

        $publication = Publication::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        $sections = Section::latest()->get();
        $sections->prepend('', '');
        $sections = $sections->pluck('label', 'id');

        if ($publication->file() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }

        return view('managers.views.publications.edit')->with([
            'publication' => $publication,
            'thumbnail' => $thumbnail,
            'availables' => $availables,
            'sections' => $sections,
        ]);

        
    }

    public function update(Request $request, $slack)
    {
        $publication = Publication::slack($slack);
        $publication->sublabel = $request->sublabel;
        $publication->label = $request->label;
        $publication->description = $request->description;
        $publication->section_id = $request->section;
        $publication->available = $request->available;
        $publication->updated_at = new \DateTime();
        $publication->save();

        return response()->json($publication->slack);
    }



    public function getFile($slack)
    {

        $publication = Publication::slack($slack);

        if ($publication->file() != null) {

            $thumbnail = $publication->file();

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

    public function storeFile(Request $request)
    {

        if ($request->file('file')) {


            $publication = Publication::slack($request->publication);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/publications' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $publication->storeAndSetFile($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'seat' => $publication->slack]);
        }
    }


    public function deleteFile($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/publications' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/publications' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }

    
    public function destroy($slack)
    {

        $publication = Publication::slack($slack);
        $publication->delete();

        return redirect()->route('manager.publications');
    }
}
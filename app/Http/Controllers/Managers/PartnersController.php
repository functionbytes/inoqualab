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
use App\Models\Partner;
use App\Models\Media;
use App\Models\Utilities;


class PartnersController extends Controller
{


    public function index()
    {

        $partners = Partner::get();

        return view('managers.views.partners.index')->with([
            'partners' => $partners,
        ]);
    }


    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        return view('managers.views.partners.create')->with([
            'availables' => $availables,

        ]);
    }

    public function store(Request $request)
    {


        $partner = new Partner;
        $partner->slack = $this->generate_slack("partners");
        $partner->label = $request->label;
        $partner->url = $request->url;
        $partner->available = $request->available;
        $partner->save();

        return response()->json($partner->slack);
    }

    public function edit($slack)
    {

        $partner = Partner::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');


        if ($partner->thumbnail() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }

        if ($partner->pdf() != null) {
            $pdf = true;
        } else {
            $pdf = null;
        }



        return view('managers.views.partners.edit')->with([
            'partner' => $partner,
            'pdf' => $pdf,
            'thumbnail' => $thumbnail,
            'availables' => $availables,

        ]);

        
    }

    public function update(Request $request, $slack)
    {
        $partner = Partner::slack($slack);
        $partner->label = $request->label;
        $partner->url = $request->url;
        $partner->available = $request->available;
        $partner->updated_at = new \DateTime();
        $partner->save();

        return response()->json($partner->slack);
    }




    public function getPdf($slack)
    {

        $partner = Partner::slack($slack);

        if ($partner->pdf() != null) {

            $thumbnail = $partner->pdf();

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


    public function getThumbnail($slack)
    {

        $partner = Partner::slack($slack);

        if ($partner->thumbnail() != null) {
            $thumbnail = $partner->thumbnail();

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
            
            $partner = Partner::slack($request->partner);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/partners' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $partner->storeAndSetThumbnail($new_thumbnail, $thumbnail_name, $thumbnail_size);

            return response()->json(['status' => "success", 'partner' => $partner->slack]);
        }
    }

    public function storePdf(Request $request)
    {

        if ($request->file('file')) {


            $partner = Partner::slack($request->partner);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/partners' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $partner->storeAndSetPdf($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'partner' => $partner->slack]);
        }
    }


    public function deletePdf($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/partners' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/partners' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }


    public function deleteThumbnail($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/partners' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/partners' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }


    public function destroy($slack)
    {

        $partner = Partner::slack($slack);
        $partner->delete();

        return redirect()->route('manager.partners');
    }
}
<?php


namespace App\Http\Controllers\Managers;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Utilities;
use App\Models\Mediable;
use App\Models\Service;
use App\Models\Media;
use Image;


class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::get();
        return view('managers.views.services.index')->with([
            'services' => $services,
        ]);
    }

    public function edit($slack)
    {
        $service = Service::slack($slack);
        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);
        $availables = $availables->pluck('title','id');

        if ($service->thumbnail() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }


        if ($service->pdf() != null) {
            $pdf = true;
        } else {
            $pdf = null;
        }


        return view('managers.views.services.edit')->with([
            'service' => $service,
            'pdf' => $pdf,
            'availables' => $availables,
            'thumbnail' => $thumbnail,

        ]);
    }

    public function update(Request $request)
    {
        
        $service = Service::slack($request->slack);
        $service->label = $request->label;
        $service->available = $request->available;
        $service->save();

        return response()->json($service->slack);

    }


    public function getThumbnail($slack)
    {

        $service = Service::slack($slack);

        if ($service->thumbnail() != null) {

            $thumbnail = $service->thumbnail();

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


            $service = Service::slack($request->service);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/services' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $service->storeAndSetThumbnail($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'service' => $service->slack]);
        }
    }


    public function deleteThumbnail($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/services' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/services' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }



    public function getPdf($slack)
    {

        $service = Service::slack($slack);

        if ($service->pdf() != null) {

            $thumbnail = $service->pdf();

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

    public function storePdf(Request $request)
    {

        if ($request->file('file')) {


            $service = Service::slack($request->service);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/services' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $service->storeAndSetPdf($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'service' => $service->slack]);
        }
    }


    public function deletePdf($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/services' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/services' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }



    public function destroy($slack)
    {
        $service = Service::slack($slack);
        $service->delete();
        return redirect()->route('manager.services');
    }


}


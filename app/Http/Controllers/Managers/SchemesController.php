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
use App\Models\Scheme;
use App\Models\System;
use App\Models\Media;
use App\Models\Utilities;

class SchemesController extends Controller
{

    public function index()
    {

        $schemes = Scheme::get();

        return view('managers.views.schemes.index')->with([
            'schemes' => $schemes,
        ]);
    }


    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        $systems = System::latest()->get();
        $systems->prepend('', '');
        $systems = $systems->pluck('label', 'id');


        return view('managers.views.schemes.create')->with([
            'systems' => $systems,
            'availables' => $availables,

        ]);
    }

    public function store(Request $request)
    {

        $scheme = new Scheme;
        $scheme->slack = $this->generate_slack("schemes");
        $scheme->sublabel = $request->sublabel;
        $scheme->label = $request->label;
        $scheme->url = $request->url;
        $scheme->description = $request->description;
        $scheme->system_id = $request->system;
        $scheme->available = $request->available;
        $scheme->save();

        return response()->json($scheme->slack);
        
    }

    public function edit($slack)
    {

        $scheme = Scheme::slack($slack);

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title', 'id');

        $systems = System::latest()->get();
        $systems->prepend('', '');
        $systems = $systems->pluck('label', 'id');


        return view('managers.views.schemes.edit')->with([
            'scheme' => $scheme,
            'availables' => $availables,
            'systems' => $systems,
        ]);

        
    }

    public function update(Request $request, $slack)
    {
        $scheme = Scheme::slack($slack);
        $scheme->sublabel = $request->sublabel;
        $scheme->label = $request->label;
        $scheme->url = $request->url;
        $scheme->description = $request->description;
        $scheme->system_id = $request->system;
        $scheme->available = $request->available;
        $scheme->updated_at = new \DateTime();
        $scheme->save();

        return response()->json($scheme->slack);
    }


    
    public function destroy($slack)
    {

        $scheme = Scheme::slack($slack);
        $scheme->delete();

        return redirect()->route('manager.schemes');
    }

}
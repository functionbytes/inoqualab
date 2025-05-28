<?php


namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\System;


class SystemsController extends Controller
{

    public function index()
    {
        $systems = System::get();
        return view('managers.views.systems.index')->with([
            'systems' => $systems,
        ]);
    }

    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');
        return view('managers.views.systems.create')->with([
            'availables' => $availables,

        ]);

    }

    public function store(Request $request)
    {
        $system = new System;
        $system->slack = $this->generate_slack("systems");
        $system->slug  = Str::slug($request->label, '-');
        $system->label = $request->label;
        $system->available = $request->available;
        $system->save();

        return redirect()->route('manager.systems');
    }

    public function edit($slack)
    {
        $system = System::slack($slack);
        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);
        $availables = $availables->pluck('title','id');

        return view('managers.views.systems.edit')->with([
            'system' => $system,
            'availables' => $availables,

        ]);
    }

    public function update(Request $request)
    {
        
        $system = System::slack($request->slack);
        $system->label = $request->label;
        $system->available = $request->available;
        $system->save();

        return redirect()->route('manager.systems');

    }

    public function destroy($slack)
    {
        $system = System::slack($slack);
        $system->delete();
        return redirect()->route('manager.systems');
    }


}


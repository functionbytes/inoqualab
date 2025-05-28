<?php


namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Section;


class SectionsController extends Controller
{

    public function index()
    {
        $sections = Section::get();
        return view('managers.views.sections.index')->with([
            'sections' => $sections,
        ]);
    }

    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');
        return view('managers.views.sections.create')->with([
            'availables' => $availables,

        ]);

    }

    public function store(Request $request)
    {
        $section = new Section;
        $section->slack = $this->generate_slack("sections");
        $section->slug  = Str::slug($request->label, '-');
        $section->label = $request->label;
        $section->available = $request->available;
        $section->save();

        return redirect()->route('manager.sections');
    }

    public function edit($slack)
    {
        $section = Section::slack($slack);
        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);
        $availables = $availables->pluck('title','id');

        return view('managers.views.sections.edit')->with([
            'section' => $section,
            'availables' => $availables,

        ]);
    }

    public function update(Request $request)
    {
        
        $section = Section::slack($request->slack);
        $section->label = $request->label;
        $section->available = $request->available;
        $section->save();

        return redirect()->route('manager.sections');

    }

    public function destroy($slack)
    {
        $section = Section::slack($slack);
        $section->delete();
        return redirect()->route('manager.sections');
    }


}


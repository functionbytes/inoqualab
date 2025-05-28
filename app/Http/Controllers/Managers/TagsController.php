<?php


namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Tag;


class TagsController extends Controller
{

    public function index()
    {
        $tags = Tag::get();
        return view('managers.views.tags.index')->with([
            'tags' => $tags,
        ]);
    }

    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],

        ]);

        $availables = $availables->pluck('title','id');


        return view('managers.views.tags.create')->with([
            'availables' => $availables,

        ]);

    }


    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->slack = $this->generate_slack("tags");
        $tag->slug  = Str::slug($request->label, '-');
        $tag->label = $request->label;
        $tag->available = $request->available;

        $tag->save();

        return redirect()->route('manager.tags');

    }


    public function edit($slack)
    {
        $tag = Tag::slack($slack);

        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);

        $availables = $availables->pluck('title','id');

        return view('managers.views.tags.edit')->with([
            'tag' => $tag,
            'availables' => $availables,

        ]);
    }

    public function update(Request $request)
    {
        $tag = Tag::slack($request->slack);
        $tag->label = $request->label;
        $tag->slug  = Str::slug($request->label, '-');
        $tag->available = $request->available;
        $tag->save();

        return redirect()->route('manager.tags');

    }

    public function destroy($slack)
    {
        $tag = Tag::slack($slack);
        $tag->delete();
        return redirect()->route('manager.tags');
    }

}


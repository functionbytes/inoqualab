<?php


namespace App\Http\Controllers\Managers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Categorie;


class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categorie::get();
        return view('managers.views.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {

        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('title','id');
        return view('managers.views.categories.create')->with([
            'availables' => $availables,

        ]);

    }

    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->slack = $this->generate_slack("categories");
        $categorie->slug  = Str::slug($request->label, '-');
        $categorie->label = $request->label;
        $categorie->available = $request->available;
        $categorie->save();

        return redirect()->route('manager.categories');
    }

    public function edit($slack)
    {
        $categorie = Categorie::slack($slack);
        $availables = collect([
            ['id' => '0', 'title' => 'Inactivo'],
            ['id' => '1', 'title' => 'Activo'],
        ]);
        $availables = $availables->pluck('title','id');

        return view('managers.views.categories.edit')->with([
            'categorie' => $categorie,
            'availables' => $availables,

        ]);
    }

    public function update(Request $request)
    {
        
        $categorie = Categorie::slack($request->slack);
        $categorie->label = $request->label;
        $categorie->available = $request->available;
        $categorie->save();

        return redirect()->route('manager.categories');

    }

    public function destroy($slack)
    {
        $categorie = Categorie::slack($slack);
        $categorie->delete();
        return redirect()->route('manager.categories');
    }


}


<?php

namespace App\Http\Controllers\Managers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Models\Mediable;
use App\Models\Media;

use App\Models\Utilities;
use App\Models\Dependencie;

class DependenciesController extends Controller
{

    public function index(){

        $dependencies = Dependencie::latest()->get();

        return view('managers.views.dependencies.index')->with([
            'dependencies' => $dependencies,
        ]);

    }


    public function create(){

        $availables = ['Inactivo','Activo'];

        return view('managers.views.dependencies.create')->with([
            'availables' => $availables,
        ]);

    }

    public function edit($slack){

        $dependencie = Dependencie::slack($slack);
        $availables = ['Inactivo','Activo'];
        $available = $dependencie->available;

        return view('managers.views.dependencies.edit')->with([
            'dependencie' => $dependencie,
            'availables' => $availables,
            'available' => $available,
        ]);

    }


    public function update(Request $request , $slack){

        $dependencie = Dependencie::slack($slack);
        $dependencie->label = $request->label;
        $dependencie->email = $request->email;
        $dependencie->slug  = Str::slug($request->label, '-');
        $dependencie->updated_at = new \DateTime();

        if($request->available!= null){
            $dependencie->available = 1;
        }else{
            $dependencie->available = 0;
        }

        $dependencie->save();

        return redirect()->route('manager.dependencies');

    }


    public function store(Request $request){

        $dependencie = new Dependencie;
        $dependencie->slack = $this->generate_slack('dependencies');
        $dependencie->label = $request->label;
        $dependencie->email = $request->email;
        $dependencie->slug  = Str::slug($request->label, '-');
        $dependencie->updated_at = new \DateTime();

        if($request->available!= null){
            $dependencie->available = 1;
        }else{
            $dependencie->available = 0;
        }

        $dependencie->save();

        return redirect()->route('manager.dependencies');

    }


    public function destroy($slack)
    {
        $dependencie = Dependencie::slack($slack);
        $dependencie->delete();
        return redirect()->route('manager.dependencies');
    }


}

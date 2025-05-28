<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Utilities;
use App\Models\Application;
use App\Models\Stand;
use App\Models\Canopy;

class ApplicationsController extends Controller
{

        public function index(){

                $applications = Application::latest()->get();

                return view('managers.views.applications.index')->with([
                    'applications' => $applications,
                ]);
        }

        public function edit($slack){

            $application = Application::slack($slack);

            $available = $application->reviewed;

            $availables = collect([
                ['id' => '0', 'title' => 'Pendiente'],
                ['id' => '1', 'title' => 'Revisado'],
            ]);

            $availables = $availables->pluck('title','id');

            return view('managers.views.applications.edit')->with([
                'application' => $application,
                'availables' => $availables,
                'available' => $available,
            ]);

        }

        public function update(Request $request){

            $application = Application::slack($request->slack);
            $application->reviewed = $request->reviewed;
            $application->updated_at = new \DateTime();
            $application->save();

            return redirect()->route('manager.applications');

        }


        public function destroy($slack){

            $application = Application::slack($slack);
            $application->delete();

            return redirect()->route('manager.applications');

        }
}

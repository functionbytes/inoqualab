<?php


namespace App\Http\Controllers\Dependencies;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\User;
use App\Models\Dependencie;
use App\Models\Profile;

class UsersController extends Controller
{

    public function index()
    {
        $actives = User::available(1);
        $inactives = User::available(0);

        return view('dependencies.views.users.index')->with([
            'actives' => $actives,
            'inactives' => $inactives
        ]);
    }

    public function create()
    {
        $profiles =  Profile::latest()->pluck('title', 'id');
        $availables = ['Inactivo','Activo'];

        return view('dependencies.views.users.create')->with([
            'profiles' => $profiles,
            'availables' => $availables
        ]);
    }


    public function store(Request $request)
    {

        $profile = Profile::id($request->profile);
        $dependencie = Dependencie::slug($profile->slug);

        $user = new User;
        $user->token = User::generate();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->cellphone = $request->cellphone;
        $user->charge = $request->charge;

        if($request->available!= null){
            $user->available = 1;
        }else{
            $user->available = 0;
        }

        $user->email =$request->email;
        $user->password = $request->password;
        $user->profile_id = $request->profile;
        $user->dependencie_id = $dependencie->id;
        $user->created_at = new \DateTime();
        $user->updated_at = new \DateTime();
        $user->save();

        return redirect()->route('dependencie.users.index')->withSuccess(__('users.deleted'));

    }

    public function edit($username){


    }

    public function update(Request $request, $username){

        $profile = Profile::id($request->profile);
        $dependencie = Dependencie::slug($profile->slug);

        $user = User::id($username);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->cellphone = $request->cellphone;
        $user->charge = $request->charge;
        $user->email =$request->email;

        if($request->password!=null){
            $user->password = $request->password;
        }

        if($request->available!= null){
            $user->available = 1;
        }else{
            $user->available = 0;
        }

        $user->dependencie_id = $dependencie->id;
        $user->profile_id = $request->profile;
        $user->updated_at = new \DateTime();
        $user->save();

        return redirect()->route('dependencie.users.index')->withSuccess(__('users.updated'));

    }

    public function destroy($id){

       $user = User::id($id);
       $user->delete();
       return redirect()->route('dependencie.users.index')->withSuccess(__('users.deleted'));
    }
}

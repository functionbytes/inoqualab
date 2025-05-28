<?php


namespace App\Http\Controllers\Managers;

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
        $users = User::get();

        return view('managers.views.users.index')->with([
            'users' => $users,
        ]);
    }

    public function create()
    {
        $dependencies =  Dependencie::latest()->pluck('label', 'id');
        $availables = ['Inactivo','Activo'];

        return view('managers.views.users.create')->with([
            'dependencies' => $dependencies,
            'availables' => $availables
        ]);
    }


    public function store(Request $request)
    {

        $dependencie = Dependencie::id($request->dependencie);

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

        return redirect()->route('manager.users.index');

    }

    public function edit($username){

        $user = User::token($username);
        $availables = [ 'Inactivo' ,'Activo'];
        $dependencies =  Dependencie::latest()->pluck('label', 'id');
        $dependencie = $user->dependencie_id;
        $available = $user->available;

        return view('managers.views.users.edit')->with([
            'dependencies' => $dependencies,
            'dependencie' => $dependencie,
            'user' => $user,
            'availables' => $availables,
            'available' => $available,
        ]);
    }

    public function update(Request $request, $username){

        $dependencie = Dependencie::id($request->dependencie);

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
        $user->updated_at = new \DateTime();
        $user->save();

        return redirect()->route('manager.users');

    }

    public function destroy($id){

       $user = User::slack($id);
       $user->delete();
       return redirect()->route('manager.users');
    }
}

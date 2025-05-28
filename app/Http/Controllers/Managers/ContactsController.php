<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Utilities;
use App\Models\Contact;
use App\Models\Stand;
use App\Models\Canopy;

class ContactsController extends Controller
{

        public function index(){

                $contacts = Contact::latest()->get();

                return view('managers.views.contacts.index')->with([
                    'contacts' => $contacts,
                ]);
        }

        public function edit($slack){

            $contact = Contact::slack($slack);

            $available = $contact->reviewed;

            $availables = collect([
                ['id' => '0', 'title' => 'Pendiente'],
                ['id' => '1', 'title' => 'Revisado'],
            ]);

            $availables = $availables->pluck('title','id');

            return view('managers.views.contacts.edit')->with([
                'contact' => $contact,
                'availables' => $availables,
                'available' => $available,
            ]);

        }

        public function update(Request $request){

            $contact = Contact::slack($request->slack);
            $contact->updated_at = new \DateTime();

            if($request->reviewed != null){
                $contact->reviewed = 1;
            }else{
                $contact->reviewed = 0;
            }
    

            $contact->save();

            return redirect()->route('manager.contacts');

        }


        public function destroy($slack){

            $contact = Contact::slack($slack);
            $contact->delete();

            return redirect()->route('manager.contacts');

        }
}

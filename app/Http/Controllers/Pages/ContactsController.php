<?php


namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Mail\Contacts\ResponseMails;
use App\Mail\Contacts\AlertsMails;
use App\Models\Contact;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class ContactsController extends Controller
{

    public function index()
    {

        SEOMeta::setTitle('Medical Innovation & Technology');
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology');
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology');
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology');
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');

        return view('pages.views.contacts.index')->with([]);
    }

    public function success($slack)
    {

        SEOMeta::setTitle('Medical Innovation & Technology');
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology');
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology');
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology');
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');

        $contact = Contact::slack($slack);

        return view('pages.views.contacts.success')->with([
            'contact' => $contact,
        ]);
    }


    public function store(Request $request)
    {
        //if($request->input('g-recaptcha-response')!= null){

            $contact = new Contact;
            $contact->slack = $this->generate_slack("contacts");
            $contact->names = $request->names;
            $contact->cellphone = $request->cellphone;
            $contact->email = $request->email;
            $contact->reviewed = 0;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
    
            Mail::send(new AlertsMails($contact));
            Mail::send(new ResponseMails($contact));

            return response()->json("true");

        //}else {

          //  return response()->json("Debes confirmar que no eres un robot");
        //}
        

    }
}

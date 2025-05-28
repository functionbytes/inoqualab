<?php


namespace App\Http\Controllers\Pages;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Application;

use App\Mail\Applications\ResponseMails;
use App\Mail\Applications\AlertsMails;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;


class ApplicationsController extends Controller
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

        $services = Service::get();
        $services = $services->pluck('label','id');
        $services->prepend('' , '');

        return view('pages.views.applications.index')->with([
            'services' => $services,
        ]);

    }


    public function application(Request $request)
    {
        //if($request->input('g-recaptcha-response')!= null){

            $application = new Application;
            $application->slack = $this->generate_petition("applications");
            $application->names = $request->names;
            $application->cellphone = $request->cellphone;
            $application->company = $request->company;
            $application->charge = $request->charge;
            $application->email = $request->email;
            $application->service_id = $request->service;
            $application->reviewed = 0;
            $application->message = $request->message;
            $application->save();
    
            Mail::send(new AlertsMails($application));
            Mail::send(new ResponseMails($application));

            return response()->json("true");
            

        //}else {

          //  return response()->json("Debes confirmar que no eres un robot");
        //}
        

    }


}

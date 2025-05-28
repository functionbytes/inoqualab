<?php


namespace App\Http\Controllers\Pages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\File;

use App\Mail\Petitions\ResponseMails;
use App\Mail\Petitions\AlertsMails;

use App\Models\Dependencie;
use App\Models\Type;
use App\Models\Status;
use App\Models\Prioritie;
use App\Models\Petition;
use App\Models\Utilities;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class PetitionsController extends Controller
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

        $dependencies = Dependencie::latest()->get();
        $dependencies->prepend('', '');
        $dependencies = $dependencies->pluck('label', 'id');

        $types = Type::latest()->get();
        $types->prepend('', '');
        $types = $types->pluck('label', 'id');

        return view('pages.views.petitions.index')->with([
            'types' => $types,
            'dependencies' => $dependencies,
        ]);
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


        $petition = Petition::slack($slack);
        $dependencie = $petition->dependencie;

        return view('pages.views.petitions.success')->with([
            'petition' => $petition,
            'dependencie' => $dependencie->title,
        ]);
    }


    public function store(Request $request)
    {

        $status = Status::slug('pendiente');
        $prioritie = Prioritie::slug('baja');
        $year =  Carbon::now()->format('Y');

        $petition = new Petition;
        $petition->slack = ucwords($this->generate_petition('petitions'));
        $petition->number = $year . '-' . $this->generate_number('petitions');
        $petition->firstname = $request->firstname;
        $petition->lastname = $request->lastname;
        $petition->email = $request->email;
        $petition->cellphone = $request->cellphone;
        $petition->observation = $request->message;
        $petition->status_id = $status->id;
        $petition->prioritie_id = $prioritie->id;
        $petition->dependencie_id = $request->dependencie;
        $petition->type_id = $request->type;
        $petition->save();

      
        if ($request->hasFile('documents')) {
            $thumbnail = $request->file('documents');
            $thumbnail_name = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_path = $thumbnail->getRealPath();
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/documents' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $petition->storeAndSetDocument($thumbnail, $new_thumbnail);
        }

        Mail::send(new ResponseMails($petition));
        Mail::send(new AlertsMails($petition));

        return response()->json([
            'success' => true,
            'slack' => $petition->slack,
            'message' => 'Se genero correctamente',
        ]);

       



    }
}

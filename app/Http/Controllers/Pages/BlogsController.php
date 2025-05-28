<?php


namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Categorie;
use App\Support\Collection as Collections;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class BlogsController extends Controller
{

    public function index()
    {

        SEOMeta::setTitle('Medical Innovation & Technology - Blogs');
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology - Blogs');
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology - Blogs');
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology - Blogs');
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');

        $blogs = Blog::available()->orderBy('created_at', 'desc');
        $categories = Categorie::all();
        $tags = Tag::all();
        $recents = Blog::get()->take(2);

        return view('pages.views.blogs.index')->with([
            'blogs' => $blogs->paginate(10),
            'tags' => $tags,
            'recents' => $recents,
            'categories' => $categories,
        ]);
    }


    public function categories($slug)
    {

        $categorie = Categorie::slug($slug);

        SEOMeta::setTitle('Medical Innovation & Technology - Blogs');
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology - Blogs');
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology - Blogs');
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology - Blogs');
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');



        if (count($categorie->get()) > 0) {
            $blogs = Blog::categories($categorie->id)->available()->orderBy('created_at', 'desc');
        } else {
            $blogs = new Collection;
            $blogs = (new Collections($blogs))->paginate(10);
        }

        $tags = Tag::all();
        $categories = Categorie::all();
        $recents = Blog::get()->take(3);

        return view('pages.views.blogs.index')->with([
            'blogs' => $blogs->paginate(10),
            'tags' => $tags,
            'categories' => $categories,
            'recents' => $recents,
        ]);
    }

    public function tags($slug)
    {
        SEOMeta::setTitle('Medical Innovation & Technology - Blogs');
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology - Blogs');
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology - Blogs');
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology - Blogs');
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');


        $tag = Tag::slug($slug);

        if (count($tag->get()) > 0) {
            $blogs = $tag->blogs;
            $blogs = (new Collections($blogs))->paginate(10);
        } else {
            $blogs = new Collection;
            $blogs = (new Collections($blogs))->paginate(10);
        }

        $tags = Tag::all();
        $categories = Categorie::all();
        $recents = Blog::get()->take(3);

        return view('pages.views.blogs.index')->with([
            'blogs' => $blogs,
            'tags' => $tags,
            'categories' => $categories,
            'recents' => $recents,
        ]);
    }


    public function view($slug)
    {

        $blog = Blog::slug($slug);

        SEOMeta::setTitle('Medical Innovation & Technology - ' . $blog->label);
        SEOMeta::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOMeta::setCanonical('https:/medical-int.com/');

        SEOTools::setTitle('Medical Innovation & Technology - ' . $blog->label);
        SEOTools::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        SEOTools::opengraph()->setUrl('https:/medical-int.com/');
        SEOTools::setCanonical('https:/medical-int.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@medicalinnovation&technology');
        SEOTools::jsonLd()->addImage('https:/medical-int.com/pages/img/meta.png');

        OpenGraph::setTitle('Medical Innovation & Technology - ' . $blog->label);
        OpenGraph::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        OpenGraph::setUrl('https:/medical-int.com/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-En');
        OpenGraph::addImage('https:/medical-int.com/pages/img/meta.png');

        JsonLd::setTitle('Medical Innovation & Technology - ' . $blog->label);
        JsonLd::setDescription('De la mano de nuestras soluciones digitales te acompañamos a optimizar tus procesos e implementar nuevos servicios de salud digital, los cuales permitirán una mayor rentabilidad de tu centro y una atención oportuna y de calidad a tus pacientes.');
        JsonLd::addImage('https:/medical-int.com/pages/img/meta.png');

        $categorie = $blog->categorie;
        $categories = Categorie::all();
        $recents = Blog::get()->take(2);
        $relateds = $categorie->blogs->take(3);
        $tags = Tag::all();

        $comments = [];

        return view('pages.views.blogs.view')->with([
            'blog' => $blog,
            'categories' => $categories,
            'tags' => $tags,
            'recents' => $recents,
            'relateds' => $relateds,
            'views' => [],
            'comments' => $comments
        ]);
    }


    public function filters(Request $request)
    {

        $search = $request->search;

        $blogs = Blog::search($search)->available()->orderBy('created_at', 'desc');

        $categories = Categorie::all();
        $tags = Tag::all();
        $recents = Blog::get()->take(2);

        return view('pages.views.blogs.index')->with([
            'blogs' => $blogs->paginate(10),
            'tags' => $tags,
            'recents' => $recents,
            'categories' => $categories,
        ]);
    }
}
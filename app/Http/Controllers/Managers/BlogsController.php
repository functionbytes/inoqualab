<?php

namespace App\Http\Controllers\Managers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Support\Collection as Collections;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use App\Models\Mediable;
use Image;

use App\Models\Tag;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Utilities;
use App\Models\Media;
use App\Models\Blog;

class BlogsController extends Controller
{

    public function index()
    {

        $blogs = Blog::latest()->get();

        return view('managers.views.blogs.index')->with([
            'blogs' => $blogs,

        ]);
    }


    public function create()
    {


        $categories = Categorie::latest()->get();
        $categories->prepend('', '');
        $categories = $categories->pluck('label', 'id');


        $tags = Tag::latest()->get();
        $tags = $tags->pluck('label', 'id');

        $availables = collect([
            ['id' => '1', 'label' => 'Activo'],
            ['id' => '0', 'label' => 'Inactivo'],
        ]);

        $availables = $availables->pluck('label', 'id');

        return view('managers.views.blogs.create')->with([
            'tags' => $tags,
            'categories' => $categories,
            'availables' => $availables,
        ]);
    }

    public function store(Request $request)
    {

        $user = User::auth();

        $blog = new Blog;
        $blog->label = $request->label;
        $blog->slug  = Str::slug($request->label, '-');
        $blog->slack = $this->generate_slack("blogs");
        $blog->description = $request->description;
        $blog->available = $request->available;
        $blog->sentence = $request->sentence;
        $blog->content = $request->content;
        $blog->categorie_id = $request->categorie;
        $blog->date_at = $request->date_at;
        $blog->save();

        return response()->json($blog->slack);
    }


    public function edit($slack)
    {

        $blog = Blog::slack($slack);

        $categories = Categorie::latest()->get();
        $categories->prepend('', '');
        $categories = $categories->pluck('label', 'id');

        $tags = Tag::latest()->get();
        $tags = $tags->pluck('label', 'id');


        $availables = collect([
            ['id' => '1', 'title' => 'Activo'],
            ['id' => '0', 'title' => 'Inactivo'],
        ]);

        if ($blog->thumbnail() != null) {
            $thumbnail = true;
        } else {
            $thumbnail = null;
        }

        $availables = $availables->pluck('title', 'id');

        return view('managers.views.blogs.edit')->with([
            'blog' => $blog,
            'tags' => $tags,
            'categories' => $categories,
            'thumbnail' => $thumbnail,
            'availables' => $availables,
        ]);
    }

    public function update(Request $request, $slack)
    {

        $user = User::auth();
        $blog = Blog::slack($slack);

        $blog->label = $request->label;
        $blog->slug  = Str::slug($request->label, '-');
        $blog->description = $request->description;
        $blog->sentence = $request->sentence;
        $blog->content = $request->content;
        $blog->categorie_id = $request->categorie;
        $blog->available = $request->available;
        $blog->date_at = $request->date;


        $blog->updated_at = new \DateTime();
        $blog->save();

        $blog->tags()->detach();

        if (!empty($request->tags)) {
            foreach ($request->tags as $key => $id) {
                $blog->tags()->attach($key, ['tag_id' => $id]);
            }
        }

        return response()->json($blog->slack);
        
    }

    public function getThumbnail($slack)
    {

        $blog = Blog::slack($slack);

        if ($blog->thumbnail() != null) {

            $thumbnail = $blog->thumbnail();

            $images[] = [
                'name' => $thumbnail->original_filename,
                'id' => $thumbnail->id,
                'file' => $thumbnail->filename,
                'size' =>  $thumbnail->file_size
            ];

            return response()->json($images);
        } else {

            $thumbnail = null;
            $images = [];

            return response()->json($images);
        }
    }

    public function storeThumbnail(Request $request)
    {

        if ($request->file('file')) {

            $blog = Blog::slack($request->blog);
            $thumbnail = $request->file('file');

            $thumbnail_names = $thumbnail->getClientOriginalName();
            $thumbnail_ext = $thumbnail->getClientOriginalExtension();
            $thumbnail_size = $thumbnail->getSize();    
            $blend = Utilities::random();
            $hash = hash('ripemd160', $blend);
            $thumbnail_dir = '/blogs' . '/';
            $new_thumbnail = $hash . "." . $thumbnail_ext;
            $thumbnail_name = $hash;
            $uploaded = Storage::disk('pages')->putFileAs($thumbnail_dir, new File($thumbnail), $new_thumbnail, 'public');
            $blog->storeAndSetThumbnail($new_thumbnail, $thumbnail_name, $thumbnail_size);
            return response()->json(['status' => "success", 'blog' => $blog->slack]);
        }
    }


    public function deleteThumbnail($name)
    {

        $media = Media::hasName($name);

        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/blogs' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/blogs' . '/' . $string);
            $media->delete();
        }

        return response()->json(['status' => "success"]);
    }



    public function destroy($slack)
    {

        $blog = Blog::slack($slack);
        $blog->delete();

        return redirect()->route('manager.blogs');
    }
}
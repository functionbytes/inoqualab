<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;
use App\Models\Section;

class Scheme extends Model
{

    use Mediable;


    protected $table = 'schemes';

    protected $fillable = [
        'id',
        'slack',
        'created_at',
        'updated_at'
    ];


    public function scopeId($query, $id)
    {
        return $query->where('id', $id)->first();
    }

    public function scopeSystems($query, $system)
    {
        return $query->where('system_id', $system)->get();
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public function scopeSlack($query, $slack)
    {
        return $query->where('slack', $slack)->first();
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', '1')->get();
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }



    /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasFile(): bool
    {
        return $this->hasMedia($this->id);
    }

    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function file()
    {
        return $this->media()->where('mime_type', "Publications")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


    /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetThumbnail($uploaded, $name, $size)
    {
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $name,
            'mime_type' => 'Publications'
        ]);

        //$media->file_size = $size;
        $media->save();
    }


    /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteThumbnail()
    {
        $media =  $this->media()->where('mime_type', "Publications")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/publications' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/publications' . '/' . $string);
            $media->delete();
        } else {
        }
    }



}
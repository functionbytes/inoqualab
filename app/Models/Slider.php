<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class Slider extends Model
{

    use Mediable;

    protected $table = 'sliders';

    protected $fillable = [
        'id',
        'slack',
        'created_at',
        'updated_at'
    ];


    public function scopeId($query ,$id)
    {
        return $query->where('id', $id)->first();
    }

    public function scopeSlack($query ,$slack)
    {
        return $query->where('slack', $slack)->first();
    }
    
    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('available', 1);
    }



    /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasThumbnail(): bool
    {
        return $this->hasMedia($this->id);
    }

    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->media()->where('mime_type', "Sliders")->where('featured', 1)->where('mediable_id', $this->id)->first();
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
            'mime_type' => 'Sliders'
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
        $media =  $this->media()->where('mime_type', "Sliders")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/sliders' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/sliders' . '/' . $string);
            $media->delete();
        } else {
        }
    }
    

}

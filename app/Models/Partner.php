<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class Partner extends Model
{

    use Mediable;
    protected $table = 'partners';

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

    public function scopeSlack($query, $slack)
    {
        return $query->where('slack', $slack)->first();
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', '1');
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
        return $this->media()->where('mime_type', "Partners")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


    public function pdf(){
        return $this->media()->where('mime_type', "Partners_Pdf")->where('featured', 1)->where('mediable_id', $this->id)->first();
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
            'mime_type' => 'Partners'
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
        $media =  $this->media()->where('mime_type', "Partners")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if ($media != null) {
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/partners' . '/' . $string);
            $elemnt = Storage::disk('pages')->delete('/partners' . '/' . $string);
            $media->delete();
        } else {
        }
    }


    public function storeAndSetPdf($uploaded, $name, $size){
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $name,
            'mime_type' => 'Partners_Pdf'
        ]);

        $media->file_size = $size;
        $media->save();

    }


    public function deletePdf(){

            $media =  $this->media()->where('mime_type', "Partners_Pdf")->where('featured', 1)->where('mediable_id', $this->id)->first();

            if($media!=null){
                $string = $media->filename;
                $exists = Storage::disk('pages')->exists('/partners'.'/'.$string);
                $elemnt = Storage::disk('pages')->delete('/partners'.'/'.$string);
                $media->delete();
            }else{

            }

     
    }


}
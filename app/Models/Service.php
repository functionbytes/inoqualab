<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;


class Service extends Model
{
    use Mediable;

    protected $table = 'services';

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

    public function scopeSlug($query ,$slug)
    {
        return $query->where('slug', $slug)->first();
    }


    public function scopeSlack($query ,$slack)
    {
        return $query->where('slack', $slack)->first();
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', 1);
    }

    public function thumbnail(){
        return $this->media()->where('mime_type', "Services")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


    public function pdf(){
        return $this->media()->where('mime_type', "Services_Pdf")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }

    public function storeAndSetThumbnail($uploaded, $name, $size){
               $media = $this->media()->create([
                   'filename' => $uploaded,
                   'featured' => 1,
                   'original_filename' => $name,
                   'mime_type' => 'Services'
               ]);

               $media->file_size = $size;
               $media->save();

    }


    public function storeAndSetPdf($uploaded, $name, $size){
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $name,
            'mime_type' => 'Services_Pdf'
        ]);

        $media->file_size = $size;
        $media->save();

    }


    public function deletePdf(){

            $media =  $this->media()->where('mime_type', "Services_Pdf")->where('featured', 1)->where('mediable_id', $this->id)->first();

            if($media!=null){
                $string = $media->filename;
                $exists = Storage::disk('pages')->exists('/services'.'/'.$string);
                $elemnt = Storage::disk('pages')->delete('/services'.'/'.$string);
                $media->delete();
            }else{

            }

     
    }

    public function deleteThumbnail(){

               $media =  $this->media()->where('mime_type', "Services")->where('featured', 1)->where('mediable_id', $this->id)->first();

               if($media!=null){
                   $string = $media->filename;
                   $exists = Storage::disk('pages')->exists('/services'.'/'.$string);
                   $elemnt = Storage::disk('pages')->delete('/services'.'/'.$string);
                   $media->delete();
               }else{

               }

    }



}

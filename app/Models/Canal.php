<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class Canal extends Model
{

    use Mediable;
    
    protected $table = 'canals';

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

    public function thumbnail(){
        return $this->media()->where('mime_type', "Canals")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


    public function storeAndSetThumbnail($uploaded, $name, $size){
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $name,
            'mime_type' => 'Canals'
        ]);

        $media->file_size = $size;
        $media->save();

    }

        public function deleteThumbnail(){

                $media =  $this->media()->where('mime_type', "Canals")->where('featured', 1)->where('mediable_id', $this->id)->first();

                if($media!=null){
                    $string = $media->filename;
                    $exists = Storage::disk('pages')->exists('/canals'.'/'.$string);
                    $elemnt = Storage::disk('pages')->delete('/canals'.'/'.$string);
                    $media->delete();
                }else{

                }

        }


}

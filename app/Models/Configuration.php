<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use App\Models\Mediable;
use Carbon\Carbon;




class Configuration extends Model
{


    use Mediable;

     /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = "configurations";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id',
        'email',
        'phone',
        'address',
        'films',
        'facebook',
        'instagram',
        'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    ];

     /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * Scope a query to only include posts posted last month.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonth($query, $limit = 5)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()])
                     ->latest()
                     ->limit($limit);
    }

    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])
                     ->latest();
    }

   /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMonthly($query)
    {
        return $query->whereMonth("created_at", "=", date('m'));
    }

      /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasLogo(): bool
    {
        return $this->hasMedia($this->id);
    }

       /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function logo()
    {
         return $this->media()->where('mime_type', "Logo")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


   /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetLogo(UploadedFile $thumbnail , $uploaded)
    {
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $uploaded,
            'mime_type' => 'Logo'
        ]);

        $this->update(['thumbnail_id' => $media->id]);
    }


      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteLogo()
    {
         $media =  $this->media()->where('mime_type', "Logo")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/logo'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/logo'.'/'.$string);
             $media->delete();
        }else{

        }

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
         return $this->media()->where('mime_type', "Configuration")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


   /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetThumbnail(UploadedFile $thumbnail , $uploaded)
    {
        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $uploaded,
            'mime_type' => 'Configuration'
        ]);

        $this->update(['thumbnail_id' => $media->id]);
    }


      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteThumbnail()
    {
         $media =  $this->media()->where('mime_type', "Configuration")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/configurations'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/configurations'.'/'.$string);
             $media->delete();
        }else{

        }

    }



    /**
     * return the excerpt of the post content
     *
     * @param  $length
     * @return string
     */
    public function excerpt($length = 50): string
    {
        return str_limit($this->content, $length);
    }

}

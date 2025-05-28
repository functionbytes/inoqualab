<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Branch extends Model
{
    use Mediable;

 /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = "branchs";


    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'token',
        'title',
        'slug',
        'available',
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
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
     public function scopeSlug($query ,$slug)
     {
         return $query->where('slug', $slug)->first();
     }




     /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlack($query ,$slack)
    {
        return $query->where('slack', $slack)->first();
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
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasThumbnails(): bool
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
         return $this->media()->where('mime_type', "Places")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }

    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function thumbnails()
    {
         return $this->media()->where('mime_type', "Places")->where('featured', 0)->where('mediable_id', $this->id)->get();
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
            'mime_type' => 'Places'
        ]);

    }


     /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetThumbnails(UploadedFile $thumbnails , $uploaded)
    {

        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 0,
            'original_filename' => $uploaded,
            'mime_type' => 'Places'
        ]);

    }



      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteThumbnail()
    {
         $media =  $this->media()->where('mime_type', "Place")->where('featured', 1)->where('mediable_id', $this->id)->first();

        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/Places'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/Places'.'/'.$string);
             $media->delete();
        }else{

        }

    }


      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteThumbnails()
    {
        $media =  $this->media()->where('mime_type', "Place")->where('featured', 0)->where('mediable_id', $this->id)->first();


        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/Places'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/Places'.'/'.$string);
             $media->delete();
        }else{

        }

    }


    public static function generate(){

        $token = Place::random();
        $existenceToken = Place::existence($token);

        if ($existenceToken!= null) {
            existence();
        }else{
        return $token;
        }
    }

    public static function random(){

            $incluye=true;
            $longitud=20;
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            if($incluye) {
                $arrPassResult="";
                for($i=0;$i<$longitud;$i++){
                    $arrPassResult.=$caracteres[rand(0,strlen($caracteres)-1)];
                }
            }

            return $arrPassResult;
    }

    public static function existence($token){

            return Place::where("token", '=', $token)->first();
    }



}

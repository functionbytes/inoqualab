<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\Mediable;
use Carbon\Carbon;

class Region extends Model
{

    use Mediable;

      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "regions";

      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = [
        'title',
        'slug',
        'priority',
        'description',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }


    /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePosition($query)
    {
        return $query->orderBy('position', 'asc');
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
    public function scopePriority($query ,$priority)
    {
        return $query->where('priority', $priority)->get();
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
         return $this->media()->where('mime_type', "Alliance")->where('featured', 1)->where('mediable_id', $this->id)->first();
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
            'mime_type' => 'Alliance'
        ]);

    }


      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteThumbnail()
    {
         $media =  $this->media()->where('mime_type', "Alliance")->where('featured', 1)->where('mediable_id', $this->id)->first();

        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/alliances'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/alliances'.'/'.$string);
             $media->delete();
        }else{

        }

    }

}

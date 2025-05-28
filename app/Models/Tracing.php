<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Models\Petition;
use App\Models\Mediable;
use Carbon\Carbon;

class Tracing extends Model
{

    use Mediable;

      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "tracings";

      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = [
        'token',
        'user_id',
        'petition_id',
        'observation',
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
    public function scopeToken($query ,$token)
    {
        return $query->where('token', $token)->first();
    }


    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePetitions($query ,$petition)
    {
        return $query->where('petition_id', $petition)->get();
    }




    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function petition()
    {
        return $this->belongsTo(Petition::class, 'petition_id', 'id');
    }


    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

      /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasDocuments(): bool
    {
        return $this->hasMedia($this->id);
    }


    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function documents()
    {
         return $this->media()->where('mime_type', "Tracings")->where('featured', 0)->where('mediable_id', $this->id)->first();
    }

    /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetDocument(UploadedFile $thumbnail , $uploaded)
    {

        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 0,
            'original_filename' => $uploaded,
            'mime_type' => 'Tracings'
        ]);

    }

        /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteDocument()
    {
        $media =  $this->media()->where('mime_type', "Tracings")->where('featured', 1)->where('mediable_id', $this->id)->first();

        if($media!=null){
            $string = $media->filename;
            $exists = Storage::disk('pages')->exists('/tracings'.'/'.$string);
            $elemnt = Storage::disk('pages')->delete('/tracings'.'/'.$string);
            $media->delete();
        }else{

        }

    }


    public static function generate(){

        $token = Tracing::random();
        $existenceToken = Tracing::existence($token);

        if ($existenceToken!= null) {
            existence($token);
        }else{
            return $token;
        }
    }

    public static function random(){

            $incluye=true;
            $longitud=10;
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

            return Tracing::where("token", '=', $token)->first();
    }
}

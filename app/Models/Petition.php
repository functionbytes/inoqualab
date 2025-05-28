<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Models\Mediable;
use App\Models\Dependencie;
use App\Models\Type;
use App\Models\Status;
use App\Models\Report;
use App\Models\Prioritie;
use Carbon\Carbon;

class Petition extends Model
{

    use Mediable;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "petitions";

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = [
        'slack',
        'firstname',
        'lastname',
        'email',
        'cellphone',
        'observation',
        'status_id',
        'type_id',
        'dependencie_id',
        'created_at',
        'updated_at'
    ];

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

    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])
                     ->latest();
    }

    public function scopeMonthly($query)
    {
        return $query->whereMonth("created_at", "=", date('m'));
    }

     public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }


    public function scopeFilters($query ,$dependence,$status)
    {
        return $query->where('dependencie_id', $dependence)->where('status_id', $status)->get();
    }


    public static function searchDependencieAll($search, $dependencie){

        $results = new Collection;

        if(strlen($search)==10){
            $petitions  =  Petition::where('slack', $search)->get();
        }else{
            $petitions  = Petition::where('firstname', 'LIKE', "%{$search}%")->orWhere('lastname', 'LIKE', "%{$search}%")->where('dependencie_id', $dependencie)->get();
        }

        if(count($petitions)>0){
            return $petitions;
        }else{
            return $results;
        }

    }

    public static function searchDependencieStatus($search, $dependencie,$status){

        $results = new Collection;

        if(strlen($search)==10){
            $petitions  =  Petition::where('slack', $search)->where('dependencie_id', $dependencie)->where('status_id', $status)->get();
        }else{

            $petitions  = Petition::where('dependencie_id', $dependencie)->where('firstname', 'LIKE', "%{$search}%")->where('status_id', $status)->get();

            if(count($petitions)==0){
                $petitions  =   Petition::where('dependencie_id', $dependencie)->where('lastname', 'LIKE', "%{$search}%")->where('status_id', $status)->get();
            }

        }

        if(count($petitions)>0){
            return $petitions;
        }else{
            return $results;
        }

    }



    public static function searchAll($search){

        $results = new Collection;

        if(strlen($search)==10){
            $petitions  =  Petition::where('slack', $search)->get();
        }else{
            $petitions  = Petition::where('firstname', 'LIKE', "%{$search}%")->orWhere('lastname', 'LIKE', "%{$search}%")->get();
        }

        if(count($petitions)>0){
            return $petitions;
        }else{
            return $results;
        }

    }

    public static function searchStatus($search,$status){

        $results = new Collection;

        if(strlen($search)==10){
            $petitions  =  Petition::where('slack', $search)->where('status_id', $status)->get();
        }else{

            $petitions  = Petition::where('firstname', 'LIKE', "%{$search}%")->where('status_id', $status)->get();

            if(count($petitions)==0){
                $petitions  =   Petition::where('lastname', 'LIKE', "%{$search}%")->where('status_id', $status)->get();
            }

        }

        if(count($petitions)>0){
            return $petitions;
        }else{
            return $results;
        }

    }

    public function scopeSlack($query ,$slacks)
    {
        return $query->where('slack', $slacks)->first();
    }


    public function scopeReference($query ,$reference)
    {
        return $query->where('reference', $reference)->first();
    }

    public static function scopeStatu($query , $status)
    {
        return $query->where('status_id', $status)->get();
    }


    public static function scopeDependencies($query , $dependencie)
    {
        return $query->where('dependencie_id', $dependencie)->get();
    }


    public static function scopeType($query , $type)
    {
        return $query->where('type_id', $type)->get();
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function prioritie()
    {
        return $this->belongsTo(Prioritie::class, 'prioritie_id', 'id');
    }

    public function dependencie()
    {
        return $this->belongsTo(Dependencie::class, 'dependencie_id', 'id');
    }


    public function reports()    {
        return $this->belongsTo(Report::class, 'petition_id', 'id');
    }


    public function hasDocuments(): bool
    {
        return $this->hasMedia($this->id);
    }

    public function hasAnswers(): bool
    {
        return $this->hasMedia($this->id);
    }

    public function documents()
    {
         return $this->media()->where('mime_type', "Documents")->where('featured', 0)->where('mediable_id', $this->id)->first();
    }

    public function answers()
    {
         return $this->media()->where('mime_type', "Answers")->where('featured', 0)->where('mediable_id', $this->id)->first();
    }


    public function storeAndSetDocument(UploadedFile $thumbnail , $uploaded)
    {

        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 0,
            'original_filename' => $uploaded,
            'mime_type' => 'Documents'
        ]);

    }

    public function storeAndSetAnswers(UploadedFile $thumbnails , $uploaded)
    {

        $media = $this->media()->create([
            'filename' => $uploaded,
            'featured' => 0,
            'original_filename' => $uploaded,
            'mime_type' => 'Answers'
        ]);

    }

    public function deleteDocument()
    {
         $media =  $this->media()->where('mime_type', "Documents")->where('featured', 1)->where('mediable_id', $this->id)->first();


        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/documents'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/documents'.'/'.$string);
             $media->delete();
        }else{

        }

    }

    public function deleteAnswers()
    {
        $medias =  $this->media()->where('mime_type', "Answers")->where('featured', 0)->where('mediable_id', $this->id)->get();

        foreach($medias as $media){
            if($media!=null){
                $string = $media->filename;
                $exists = Storage::disk('pages')->exists('/answers'.'/'.$string);
                $elemnt = Storage::disk('pages')->delete('/answers'.'/'.$string);
                $media->delete();
            }
        }


    }


}

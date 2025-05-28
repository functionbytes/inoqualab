<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */

     protected $table = "medias";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'original_filename',
        'mime_type',
        'type',
        'featured',
        'mediable_id',
        'mediable_type'
    ];

    /**
     * Get the media's url.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('files', ['filename' => $this->filename]);
    }

    /**
     * Get the media's storage path.
     *
     * @return string
     */
    public function getPath(): string
    {
        return storage_path('app/') . $this->filename;
    }


    public static function hasId($id){
        return Media::where('id', $id)->first();
    }

    public static function hasName($name){
        return Media::where('filename', $name)->first();
    }
}

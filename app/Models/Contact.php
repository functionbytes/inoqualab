<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class Contact extends Model
{

    protected $table = 'contacts';

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
    

}

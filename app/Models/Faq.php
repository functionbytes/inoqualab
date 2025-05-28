<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class Faq extends Model
{

    protected $table = 'faqs';

    protected $fillable = [
        'id',
        'slack',
        'label',
        'description ',
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

    public function scopeAvailable($query)
    {
        return $query->where('available', '1')->orderBy('created_at', 'desc')->get();
    }

}

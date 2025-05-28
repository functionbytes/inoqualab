<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediable;

class BlogsTag extends Model
{

    protected $table = 'blog_tag';

    protected $fillable = [
        'id',
        'slack',
        'tags_id',
        'blog_id',
        'created_at',
        'updated_at'
    ];


    public function scopeId($query, $id)
    {
        return $query->where('id', $id)->first();
    }

    public function scopeSlack($query, $slack)
    {
        return $query->where('slack', $slack)->first();
    }

    public function tagsblog()
    {
        return $this->belongsTo('App\Models\TagsBlog', 'tags_id', 'id');
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id', 'id');
    }
}
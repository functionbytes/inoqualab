<?php

namespace App\Models;

use App\Models\Media;

trait Mediable
{

    /**
     * Check if the resource has a media
     *
     * @param integer $media_id
     * @return boolean
     */
    public function hasMedia($mediable_id): bool
    {        
        return $this->media()->where('mediable_id', $mediable_id)->exists();
    }

    /**
     * Get all of the resource's media.
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}

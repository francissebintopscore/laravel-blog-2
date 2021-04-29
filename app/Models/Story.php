<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(\App\Models\Tag::class, 'taggable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get all of the blogs that are assigned this tag.
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    public function blogs()
    {
        return $this->morphedByMany(\App\Models\Blog::class, 'taggables');
    }

    /**
     * Get all of the stories that are assigned this tag.
     */
    public function stories()
    {
        return $this->morphedByMany(\App\Models\Story::class, 'taggables');
    }
}

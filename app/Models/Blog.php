<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $slug = Str::slug( $value );
        // if( $this->where( 'slug', $slug )->exists() ){
        //     $slug .= '-'.$this->attributes['id'];
        // }

        $this->attributes['slug'] = $slug;
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(\App\Models\Tag::class, 'taggable');
    }
}

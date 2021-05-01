<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'body',
        'slug',
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        // $slug = Str::slug( $value );
        // if( $this->where( 'slug', $slug )->exists() ){
        //     $slug .= '-'.$this->attributes['id'];
        // }
        $slug = SlugService::createSlug($this, 'slug', $value);
        $this->attributes['slug'] = $slug;
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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

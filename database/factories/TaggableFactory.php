<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Blog;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaggableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taggable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tagId          = Tag::inRandomOrder()->limit(1)->pluck('id');

        $taggableType   = array(
                            'App\Models\Blog',
                            'App\Models\Story'
                        );
        $taggableType   = '\\'. $taggableType[rand(0, 1)];
        $taggableId     = $taggableType ::inRandomOrder()->limit(1)->pluck('id');

        return [
            'tag_id'        => $tagId->first(),
            'taggable_id'   => $taggableId->first(),
            'taggable_type' => $taggableType,
        ];
    }
}

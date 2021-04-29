<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Taggable;
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
        $tag = Tag::select('id')->inRandomOrder()->limit(1)->get();
        

        return [
            'tag_id'        => $tag,
            'taggable_id'   => $title,
            'taggable_type' => $this->faker->realText(),
        ];
    }
}

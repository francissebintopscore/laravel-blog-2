<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $fillable = [
        'name',
        'slug',
    ];
    public function definition()
    {
        $tag = $this->faker->unique()->city();
        return [
            'name'  => $tag,
            'slug'  => Str::slug( $tag ),
        ];
    }
}

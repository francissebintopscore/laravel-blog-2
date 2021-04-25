<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $fillable = [
        'title',
        'body',
        'slug',
    ];

    public function definition()
    {
        $user = User::select('id')->inRandomOrder()->limit(1)->get();
        $user = $user[0]->id;
        $title = $this->faker->unique()->streetName();


        return [
            'user_id'   => $user,
            'title'     => $title,
            'body'      => $this->faker->realText(),
            'slug'      => Str::slug( $title ),
        ];
    }
}

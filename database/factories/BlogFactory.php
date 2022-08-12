<?php

namespace Database\Factories;

use App\Models\Blog;
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
    public function definition()
    {
        $title = $this->faker->catchPhrase;

        return [
            'expired_at'    => $this->faker->boolean ? $this->faker->dateTimeBetween('-5 days', '+5 days') : null,
            'featured_at'   => $this->faker->boolean ? $this->faker->dateTimeBetween('-5 days', '+5 days') : null,
            'image_url'     => $this->faker->imageUrl(),
            'main_content'  => $this->faker->paragraphs(12, true),
            'published_at'  => $this->faker->boolean ? $this->faker->dateTimeBetween('-5 days', '+5 days') : null,
            'slug'          => Str::slug($title),
            'title'         => $title,
        ];
    }
}

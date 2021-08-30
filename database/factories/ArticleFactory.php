<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'title' => $faker->sentence(),
            'author_id' => $faker->randomDigitNotNull(),
            'published' => $faker->boolean(40), //40% chance of get true
            'image' => $faker->image('public/images/articles', 1260, 960, null, false),
            'category_id' => $faker->randomDigitNotNull(),
            'description' => $faker->paragraph(25),
        ];
    }
}

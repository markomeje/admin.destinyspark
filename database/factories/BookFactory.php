<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->image('public/images/books', 840, 1220, null, false),
            'author_id' => $this->faker->randomDigitNotNull(),
            'status' => $this->faker->boolean(40),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(14),
            'price' => $this->faker->randomFloat(2, 2.56, 15.35),
            'review_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $facebook_link = 'https://facebook.com/'.str_replace(' ', '', $this->faker->name());
        $instagram_link = 'https://instagram.com/'.str_replace(' ', '', $this->faker->name());
        $twitter_link = 'https://twitter.com/'.str_replace(' ', '', $this->faker->name());
        return [
            'description' => $this->faker->paragraph(6),
            'facebook_link' => $facebook_link,
            'instagram_link' => $instagram_link,
            'whatsapp_number' => $this->faker->phoneNumber(),
            'twitter_link' => $twitter_link,
            'user_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}

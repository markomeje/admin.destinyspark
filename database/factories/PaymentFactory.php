<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->randomDigitNotNull(),
            'amount' => $this->faker->randomFloat(2, 2.56, 15.35),
            'reference' => $this->faker->sha256(),
            'paid' => $this->faker->boolean(50),
            'user_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}

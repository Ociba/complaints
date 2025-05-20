<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'payment_method' => 'card',
            'transaction_id' => 'TXN-'.$this->faker->uuid,
            'status' => 'completed',
            'paid_at' => now(),
        ];
    }
}

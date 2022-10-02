<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = $this->faker->dateTimeThisMonth();
        $to = Carbon::make($from)->addDays(random_int(3, 25));
        $total = $this->faker->randomFloat(2, 50, 1000);
        return [
            'name' => $this->faker->sentence(),
            'from' => $from,
            'to' => $to,
            'total' => $total,
            'daily_budget' => round(($total / Carbon::parse($from)->diffInDays($to)), 2),
        ];
    }
}

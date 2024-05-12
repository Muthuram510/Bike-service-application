<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //to create bookings to check the app functionality
        return [
            'user_id' => DB::table('users')->pluck('id')->random(),
            'model' => fake()->word(),
            'body' => fake()->paragraph,
            'option1'=>null,
            'option2'=>null,
            'option3'=>null,
            'date' => fake()->dateTimeInInterval(now(), '-20 years', 'Asia/Kolkata'),
        ];
    }
}

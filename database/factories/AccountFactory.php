<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name'=> $this->faker->name(),
            'user_id'=> User::factory(),
            'company_name'=>$this->faker->optional()->company(),
            'address'=> $this->faker->optional()->address(),
            'region' => $this->faker->optional()->randomElement(['North', 'South', 'East', 'West']),
            'phone' => $this->faker->optional()->phoneNumber(),
            'mobile_prefix' => $this->faker->randomElement(['+972','+970']),
            'mobile' => $this->faker->randomNumber(9),
            'language' => $this->faker->randomElement(['arabic', 'english']),
            'default_map' => $this->faker->randomElement(['pits-map', 'bing-default', 'google-default']),
            'time_zone' => $this->faker->timezone(),
            'landing_page' => $this->faker->url(),
            'created_at' => $this->faker->optional()->dateTimeThisYear(),
            'updated_at' => $this->faker->optional()->dateTimeThisYear(),
            'deleted_at' => $this->faker->optional()->dateTimeThisYear(),
           
        ];
    }
}

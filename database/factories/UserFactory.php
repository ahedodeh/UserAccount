<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // I don't know if any attribute depends on another attribute
        $type = $this->faker->randomElement(['Tracking', 'personal', 'pitsonal']);
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'username'=> $this->faker->unique()->userName(),
            'user_type'=> $type,
            'last_login' => $this->faker->dateTimeThisYear(),
            'allowable_users' => $this->faker->randomNumber(),
            'locked_at' => $this->faker->optional()->dateTimeThisYear(),
            'financial_number' => $this->faker->optional()->creditCardNumber(),
            'background_color' => $this->faker->optional()->hexColor(),
            'created_at' => $this->faker->optional()->dateTimeThisYear(),
            'updated_at' => $this->faker->optional()->dateTimeThisYear(),
            'last_login_at' => $this->faker->optional()->dateTimeThisYear(),
            'deleted_at' => $this->faker->optional()->dateTimeThisYear(),
            'jwt_ttl' => 480,
            'imei' => $this->faker->unique()->optional()->randomNumber(),



        
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

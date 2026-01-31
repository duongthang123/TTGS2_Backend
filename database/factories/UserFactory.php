<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Rank;
use App\Models\Unit;
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
        return [
            'code' => strtoupper(Str::random(5)),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'citizen_number' => fake()->unique()->numerify('############'),
            'date' => fake()->dateTimeBetween('-45 years', '-22 years')->format('Y-m-d'),
            'old_address' => fake()->address(),
            'new_address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->numerify('0#########'),
            'rank_id' => Rank::inRandomOrder()->value('id'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'unit_id' => Unit::inRandomOrder()->value('id'),

            'joined_date' => fake()->dateTimeBetween('-20 years', '-5 years')->format('Y-m-d'),
            'unit_assigned_date' => fake()->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'party_joined_date' => fake()->optional()->dateTimeBetween('-15 years', '-3 years')?->format('Y-m-d'),
            'status' => fake()->randomElement([1, 1, 1, 2]),

            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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

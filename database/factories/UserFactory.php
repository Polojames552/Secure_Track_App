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
        return [
            'name' => fake()->name(),
            'address' => "confidential",
            'username' => fake()->unique(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'municipality' => "Bulan Municipal Station",
            'status' => "Active",
            'role' => "1",   //1 = super_admin    2 = municipal_admin    3 = investigator
            'remember_token' => Str::random(10),
          
            // 'name',
            // 'username',
            // 'password',
            // 'municipality',
            // 'municipal_director',
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

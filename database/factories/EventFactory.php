<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            // associe événement a créateur, un collectif et un sport (soit créés à la volée, soit récupérés)
            'organization_id' => Organization::inRandomOrder()->first()->id ?? 1,
            'sport_id' => Sport::inRandomOrder()->first()->id ?? 1,
            'created_by' => User::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'starts_at' => fake()->dateTimeBetween('+1 week', '+2 months'), // Date de début dans le futur
            'duration_minutes' => fake()->randomElement([60, 90, 120]), // Durée
            'city' => fake()->city(),
            'venue' => fake()->streetAddress(),
            'capacity' => fake()->numberBetween(10, 50),
            'public_token' => Str::random(15), // Génère un token aléatoire pour l'événement public
            'status' => fake()->randomElement(['draft', 'published']),
        ];
    }
}
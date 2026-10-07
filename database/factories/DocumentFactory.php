<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => User::factory(),
            'filename' => fake()->word() . '.pdf',
            'path' => 'documents/' . fake()->uuid() . '.pdf',
        ];
    }
}

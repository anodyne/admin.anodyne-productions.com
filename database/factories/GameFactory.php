<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => str($this->faker->words(3, asText: true))->title(),
            'url' => $this->faker->url,
            'genre' => $this->faker->randomElement(['baj', 'bl5', 'blank', 'bsg', 'crd', 'dnd', 'ds9', 'dsv', 'ent', 'kli', 'mov', 'rom', 'sg1', 'sga', 'sto', 'tos']),
            'version' => $this->faker->randomElement(['2.6.0', '2.6.1', '2.6.2', '2.7.0', '2.7.1', '2.7.2']),
            'php_version' => $this->faker->randomElement(['7.4', '8.0', '8.1', '8.2']),
            'db_driver' => 'mysqli',
            'db_version' => $this->faker->randomElement(['5.7', '8.0']),
            'server_software' => $this->faker->randomElement(['nginx/1.23.1', 'apache/1.17.2']),
        ];
    }
}

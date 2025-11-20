<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => 1,
            'token' => $this->faker->word(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'password' => '$2y$10$qCFSQevcTanrFfLu.5tsXeEA760wyiJOdXQya9g2qZM/i/FNFiVZO',
            'message' => $this->faker->paragraph(),
            'read'=>0
        ];
    }
}

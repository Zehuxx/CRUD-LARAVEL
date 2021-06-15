<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_role' => 2, //usuarios no administradores
            'nombre' => $this->faker->name,
            'celular' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'cedula' => $this->faker->numerify('###########'),
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = '2002-01-01'),
            'email_verified_at' => now(),
            'id_ciudad' => City::pluck('id')->random(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

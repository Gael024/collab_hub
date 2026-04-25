<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
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
        $tipos_usuarios = ['estudiante', 'profesor', 'profesional'];
        $sector = ['educacion', 'tecnologia', 'negocios', 'salud'];
        $procedencia = ['BUAP', 'IPN', 'UNAM', 'Oracle', 'Tsystems'];
        $pais = ['mexico', 'usa', 'espania', 'canada', 'brazil', 'china'];
        $referencia = ['redes', 'amigos', 'anuncio', 'empresa'];
        $caracteristica = ['presencia', 'chat', 'editor'];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // Campos extra
            'rol' => 'usuario',
            'edad' => fake()->numberBetween(18, 60),
            'tipo' => fake()->randomElement($tipos_usuarios),
            'sector' => fake()->randomElement($sector),
            'procedencia' => fake()->randomElement($procedencia),
            'pais' => fake()->randomElement($pais),
            'referencia' => fake()->randomElement($referencia),
            'carac_principal' => fake()->randomElement($caracteristica),
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

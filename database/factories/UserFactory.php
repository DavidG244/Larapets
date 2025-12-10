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
    protected static ?string $password;

    public function definition(): array
    {
        $femaleNames = ['María', 'Ana', 'Laura', 'Sofía', 'Camila', 'Valentina', 'Daniela', 'Lucía', 'Gabriela', 'Isabella'];
        $maleNames   = ['Carlos', 'Juan', 'Andrés', 'Luis', 'Jorge', 'Miguel', 'Felipe', 'Mateo', 'David', 'Sebastián'];

        $isFemale = fake()->boolean(50);

        if ($isFemale) {
            $firstName = fake()->randomElement($femaleNames);
            $gender = 'Female';
            $photoUrl = 'https://randomuser.me/api/portraits/women/' . fake()->numberBetween(1, 80) . '.jpg';
        } else {
            $firstName = fake()->randomElement($maleNames);
            $gender = 'Male';
            $photoUrl = 'https://randomuser.me/api/portraits/men/' . fake()->numberBetween(1, 80) . '.jpg';
        }

        $lastName = fake()->lastName();
        $fullname = $firstName . ' ' . $lastName;

        // Nombre y ruta de la imagen
        $filename = 'user_' . Str::slug($firstName . '_' . $lastName) . '.jpg';
        $directory = public_path('images');
        $path = $directory . '/' . $filename;

        // Crear carpeta si no existe
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Descargar imagen directamente (más compatible)
        try {
            $imageData = file_get_contents($photoUrl);
            file_put_contents($path, $imageData);
        } catch (\Exception $e) {
            // Si falla, usar imagen por defecto
            $filename = 'no-photo.png';
        }

        return [
            'document'  => fake()->numerify('75#######'),
            'fullname'  => $fullname,
            'gender'    => $gender,
            'birthdate' => fake()->date(),
            'photo'     => 'images/' . $filename,
            'phone'     => fake()->numerify('310######'),
            'email'     => strtolower($firstName . '.' . $lastName . fake()->unique()->numberBetween(1, 9999) . '@example.com'),
            'email_verified_at' => now(),
            'password'  => static::$password ??= Hash::make('password'),
            'active'    => 1,
            'role'      => 'Customer',
            'remember_token' => Str::random(10)
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

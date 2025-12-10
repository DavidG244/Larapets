<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $petNames = [
                'Luna', 'Bella', 'Charlie', 'Lucy', 'Daisy', 'Max', 'Rosie', 'Lola',
    'Lily', 'Leo', 'Stella', 'Cooper', 'Bailey', 'Oliver', 'Milo', 'Buddy',
    'Sadie', 'Penny', 'Coco', 'Sophie', 'Olive', 'Ruby', 'Ollie', 'Molly',
    'Pepper', 'Willow', 'Gracie', 'Scout', 'Maggie', 'Jack', 'Finn', 'Chloe',
    'Frankie', 'Poppy', 'Gus', 'Nala', 'Teddy', 'Ziggy', 'Ginger', 'Loki',
    'Piper', 'Lulu', 'Bear', 'Ellie', 'Rocky', 'Louie', 'Jasper', 'Winston',
    'Tucker', 'Cleo', 'Duke', 'Harley', 'Zeus', 'Blue', 'Koda', 'Toby',
    'Bentley', 'Jax', 'Kobe', 'Ace', 'Apollo', 'Shadow', 'Bruno', 'Moose',
    'Murphy', 'Marley', 'Archie', 'Hank', 'Thor', 'Benji', 'Simba', 'Bandit',
    'Dexter', 'King', 'Diesel', 'Beau', 'Maverick', 'Cash', 'Henry', 'Mia',
    'Riley', 'Roxy', 'Nova', 'Honey', 'Lady', 'Lucky', 'Princess', 'Winnie',
    'Maya', 'Dixie', 'Athena', 'Zoe', 'Layla', 'Remi', 'Lexi', 'Sasha', 'Oakley'
    
        ];
        return [
            'name' => fake()->colorName(),
            'kind' => fake()->randomElement(array('Dog', 'Cat', 'Pig', 'Bird', 'Fish', 'Parrot')),
            'weight' => fake()->numerify('#.#'),
            'age' => fake()->numerify('#'),
            'breed' => fake()->LastName(),
            'location'=> fake()->city(),
            'description' => fake()->sentence(8)
        ];
    }
}

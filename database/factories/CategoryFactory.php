<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>json_encode(['en'=>$this->faker->words(3,true),'ar'=>$this->faker->words(3,true)
            
        ]),
        'sluge'=>$this->faker->words(3,true)
        ];
    }
}

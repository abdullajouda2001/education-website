<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path=['https://www.youtube.com/watch?v=nEcKPfKR_dI&list=PL9fwy3NUQKwZJn5R6nZCI_2ylXNzs-aGx'];
    
        return [
            //

            'name'=>json_encode(['en'=>$this->faker->words(3,true),'ar'=>$this->faker->words(3,true),]),
         'image'=>$this->faker->imageUrl(),
          'time'=>$this->faker->dateTime(),
          'course_id'=>$this->faker->numberBetween(1,5),
           'path'=>$path[$this->faker->numberBetween(0,19)]

        ];
    }
}

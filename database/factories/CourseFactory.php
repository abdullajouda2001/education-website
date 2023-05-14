<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type=['pyment','free'];
        return [
            'name'=>json_encode(['en'=>$this->faker->words(3,true),'ar'=>$this->faker->words(3,true),
            
        ]),
        'slug'=>$this->faker->words(3,true),
        'descount'=>$this->faker->numberBetween(10,50),
        'image'=>$this->faker->imageUrl(),
        'internal_contint'=>json_encode(['en'=>$this->faker->sentence(3,true),'ar'=>$this->faker->sentence(3,true) ],JSON_UNESCAPED_UNICODE),
        'external_contint'=>json_encode(['en'=>$this->faker->sentence(3,true),'ar'=>$this->faker->sentence(3,true) ],JSON_UNESCAPED_UNICODE),
        'price'=>$this->faker->numberBetween(100,500),
        'type'=>$type[$this->faker->numberBetween(100,500)],
        'category_id'=>$this->faker->numberBetween(1,5),
        ];
    
    
        //
    }
}

<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(1)->create()->first(),
            'name' => $this->faker->name(),                      
            'location' => $this->faker->city(),
            'description' => $this->faker->realText(),        
        ];
    }
}


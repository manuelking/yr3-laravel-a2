<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    public function getRatingData() {
        return [
          'job_id' => Job::all()->random()->id,
          'user_id' => User::all()->random()->id,
          'rate' => $this->faker->boolean
          'comment' => $this->faker->boolean
        ];
      }
      
      public function ratingExists($ratingData) {
        return Rating::where([
          'job_id' => $ratingData['job_id'],
          'user_id' => $ratingData['user_id']
        ])->exists();
      }
      
      public function getValidRatingData() {
        $ratingData = false;
      
        while ($ratingData === false) {
          $ratingData = $this->getRatingData();
      
          if ($this->ratingExists($ratingData)) {
            $ratingData = false;
          }
        }
      
        return $ratingData;
      }
      
      public function definition() {
        return $this->getValidRatingData();
      }
      
}

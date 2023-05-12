<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        public function run() {
            Rating::factory()
              ->count(200)
              ->create();
          }
          
    }
}

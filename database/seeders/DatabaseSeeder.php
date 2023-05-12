<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VoteSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            JobSeeder::class,
            UserSeeder::class,
            VoteSeeder::class
        ]);
    }
}


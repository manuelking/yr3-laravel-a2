<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vote;


class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vote::factory()
        ->count(200)
        ->create();
    }
}

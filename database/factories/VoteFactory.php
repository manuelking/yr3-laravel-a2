<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vote;
use App\Models\User;
use App\Models\Job;

class VoteFactory extends Factory
{

    public function getVoteData() {
        return [
            'job_id' => Job::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'is_up' => $this->faker->boolean
        ];
    }

    public function voteExists($voteData) {
        return Vote::where([
            'job_id' => $voteData['job_id'],
            'user_id' => $voteData['user_id']
        ])->exists();
    }

    public function getValidVoteData() {
        $voteData = false;

        while ($voteData === false) {
            $voteData = $this->getVoteData();

            if ($this->voteExists($voteData)) {
        $voteData = false;
        }
    }

        return $voteData;
    }

    public function definition() {
        return $this->getValidVoteData();
    }
}

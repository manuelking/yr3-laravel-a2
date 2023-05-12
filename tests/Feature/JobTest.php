<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Job;

class JobTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_jobs()
    {
        $response = $this->get('/jobs');
        $response->assertOk();

        $response->assertViewIs('jobs.index');

        $expectedPage1NameData = Job::orderBy('created_at', 'desc')
        ->take(20)
        ->pluck('description');

        $response->assertSeeInOrder(array_merge([
        'All of our Available Jobs'
        ], $expectedPage1NameData->toArray()));
    }

    public function test_update_jobs() 
    {
        $newDescription = 'Some test description';
        $job = Job::factory()->create();

        $response = $this->actingAs($job->user)
        ->followingRedirects()
        ->patch("/jobs/{$job->id}", [
            'description' => $newDescription
        ]);
        
        $newJob = $job->fresh();

        $response->assertOk();        
        $this->assertEquals($newDescription, $newJob->description);
    }
}

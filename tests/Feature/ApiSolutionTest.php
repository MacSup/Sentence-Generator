<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\SolutionSeeder;

class ApiSolutionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_can_fetch_5_random_solutions()
    {
        $this->seed(SolutionSeeder::class);

        $response = $this->get('/api/solutions/random/5');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

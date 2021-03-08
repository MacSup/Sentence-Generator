<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Solution;

class ApiSolutionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_5_random_solutions()
    {
        Solution::factory()->count(15)->create();

        $response = $this->get('/api/solutions/random');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\ObjectiveSeeder;

class ApiObjectiveTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_5_random_objectives()
    {
        $this->seed(ObjectiveSeeder::class);

        $response = $this->get('/api/objectives/random/5');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

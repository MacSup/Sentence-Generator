<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\SituationSeeder;

class ApiSituationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_5_random_situations()
    {
        $this->seed(SituationSeeder::class);

        $response = $this->get('/api/situations/random');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

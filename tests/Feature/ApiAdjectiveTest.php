<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\AdjectiveSeeder;

class ApiAdjectiveTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_fetch_5_random_adjectives()
    {
        $this->seed(AdjectiveSeeder::class);

        $response = $this->get('/api/adjectives/random');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

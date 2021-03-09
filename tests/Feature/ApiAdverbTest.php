<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\AdverbSeeder;

class ApiAdverbTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_5_random_adverbs()
    {
        $this->seed(AdverbSeeder::class);

        $response = $this->get('/api/adverbs/random');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

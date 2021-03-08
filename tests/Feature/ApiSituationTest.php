<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Situation;

class ApiSituationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_fetch_5_random_adverbs()
    {
        Situation::factory()->count(15)->create();

        $response = $this->get('/api/situations/random');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

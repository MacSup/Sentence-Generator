<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\ComplementSeeder;

class ApiComplementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_fectch_5_random_complements()
    {
        $this->seed(ComplementSeeder::class);
        
        $response = $this->get('/api/complements/random/5');
        $response->dump();

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Adverb;
use App\Models\Adjective;
use App\Models\Situation;
use App\Models\Objective;
use App\Models\Solution;
use App\Models\Story;

class StoryTest extends TestCase
{
    use RefreshDatabase;

    protected $adverb;
    protected $adjective;
    protected $situation;
    protected $objective;
    protected $solution;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adverb = Adverb::factory()->create();
        $this->adjective = Adjective::factory()->create();
        $this->situation = Situation::factory()->create();
        $this->objective = Objective::factory()->create();
        $this->solution = Solution::factory()->create();
    }

    public function test_can_create_a_new_sentence()
    {
        $words = [
            'adverb' => $this->adverb->content,
            'adjective' => $this->adjective->content,
            'situation' => $this->situation->content,
            'objective' => $this->objective->content,
            'solution' => $this->solution->content
        ];
        $story = new Story();
        $story->populateWords($words);
        $story->save();

        $this->assertDatabaseCount('stories', 1);
        $this->assertDatabaseHas('stories', [
            'id' => $story->id
        ]);
    }

    public function test_can_post_a_new_story()
    {
        $response = $this->post('/story', [
            'adverb' => $this->adverb->content,
            'adjective' => $this->adjective->content,
            'situation' => $this->situation->content,
            'objective' => $this->objective->content,
            'solution' => $this->solution->content
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseCount('stories', 1);
    }
}

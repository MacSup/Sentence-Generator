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

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            'adverb' => $this->adverb->id,
            'adjective' => $this->adjective->id,
            'situation' => $this->situation->id,
            'objective' => $this->objective->id,
            'solution' => $this->solution->id,
        ];
        $story = new Story();
        $story->populateWords($words);
        $story->dealWithImage('file');
        $story->save();

        $this->assertDatabaseCount('stories', 1);
        $this->assertDatabaseHas('stories', [
            'id' => $story->id
        ]);
    }

    public function test_can_not_post_a_new_story_if_no_image_is_upload()
    {
        $response = $this->json('post', '/api/sentences', [
            'adverb' => $this->adverb->id,
            'adjective' => $this->adjective->id,
            'situation' => $this->situation->id,
            'objective' => $this->objective->id,
            'solution' => $this->solution->id
        ]);

        $response->assertStatus(422);
        $this->assertDatabaseCount('stories', 0);
    }

    public function test_can_not_post_a_new_story_if_word_doesnt_exists()
    {
        $response = $this->json('post', '/api/sentences', [
            'adverb' => $this->adverb->id + 10,
            'adjective' => $this->adjective->id,
            'situation' => $this->situation->id,
            'objective' => $this->objective->id,
            'solution' => $this->solution->id
        ]);

        $response->assertStatus(422);
        $this->assertDatabaseCount('stories', 0);
    }

    public function test_can_post_a_new_story()
    {
        $response = $this->json('post', '/api/sentences', [
            'adverb' => $this->adverb->id,
            'adjective' => $this->adjective->id,
            'situation' => $this->situation->id,
            'objective' => $this->objective->id,
            'solution' => $this->solution->id,
            'snapshot' => 'file_content',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('stories', 1);
    }

    public function test_can_get_all_stoties()
    {
        $items = 10;
        Story::factory()->count($items)->create();

        $response = $this->json('get', '/api/sentences');

        $response->assertStatus(200);
        $response->assertJsonCount($items);
    }

    public function test_can_get_a_specific_story()
    {
        $stories = Story::factory()->count(10)->create();
        $story = $stories->random(1)->first();

        $response = $this->json('get', '/api/sentences/'.$story->id);

        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $story->id]);
    }
}

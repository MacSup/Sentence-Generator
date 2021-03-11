<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Adverb;
use App\Models\Adjective;
use App\Models\Situation;
use App\Models\Objective;
use App\Models\Solution;

use Illuminate\Http\UploadedFile;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adverb_id' => Adverb::factory()->create()->id,
            'adjective_id' => Adjective::factory()->create()->id,
            'situation_id' => Situation::factory()->create()->id,
            'objective_id' => Objective::factory()->create()->id,
            'solution_id' => Solution::factory()->create()->id,
            'file' => UploadedFile::fake()->image('image.jpg')->hashName()
        ];
    }
}

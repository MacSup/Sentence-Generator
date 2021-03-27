<?php

namespace Database\Factories;

use App\Models\Situation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SituationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Situation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => 'situation' . (string) random_int(0, 100)
        ];
    }
}

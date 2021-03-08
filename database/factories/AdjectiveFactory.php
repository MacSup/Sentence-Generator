<?php

namespace Database\Factories;

use App\Models\Adjective;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdjectiveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adjective::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => 'adjective' . (string) random_int(0, 100)
        ];
    }
}

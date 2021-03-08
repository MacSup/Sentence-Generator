<?php

namespace Database\Factories;

use App\Models\Solution;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

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

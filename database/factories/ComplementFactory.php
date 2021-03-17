<?php

namespace Database\Factories;

use App\Models\Complement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => 'complement' . (string) random_int(0,100)
        ];
    }
}

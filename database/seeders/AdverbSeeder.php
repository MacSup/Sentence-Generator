<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdverbSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 1;
    protected $table = 'adverbs';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->runSeeder();
    }
}

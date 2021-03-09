<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 9;
    protected $table = 'solutions';

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

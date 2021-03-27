<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SituationSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 4;
    protected $table = 'situations';

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

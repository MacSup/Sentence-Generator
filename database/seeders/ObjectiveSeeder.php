<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ObjectiveSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 7;
    protected $table = 'objectives';

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

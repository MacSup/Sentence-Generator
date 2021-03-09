<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdjectiveSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 2;
    protected $table = 'adjectives';

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

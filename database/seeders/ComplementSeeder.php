<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComplementSeeder extends Seeder
{
    use AutomateSeeder;
    
    protected $csvIdx = 6;
    protected $table = 'complements';
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

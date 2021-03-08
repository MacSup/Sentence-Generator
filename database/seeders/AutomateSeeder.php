<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait AutomateSeeder
{
    protected function getCSVItems()
    {
        $content = Storage::get('crepi.csv');
        $lines = explode(PHP_EOL, $content);

        $records = [];
        foreach ($lines as $line) {
            $items = str_getcsv($line, ',');
            array_push($records, $items[$this->csvIdx]);
        }
        
        return array_filter($records);
    }

    protected function insertRecords($items)
    {
        DB::table($this->table)
            ->insert(array_map(function ($value) {
                return [
                    'content' => $value
                ];
            }, $items));
    }

    protected function runSeeder()
    {
        $items = $this->getCSVItems();
        $this->insertRecords($items);
    }
}

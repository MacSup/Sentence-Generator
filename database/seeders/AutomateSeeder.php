<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

trait AutomateSeeder
{
    protected $csvFile = 'crepi.csv';

    protected function getCSVItems()
    {
        if (Storage::missing($this->csvFile)) {
            $this->downloadOnlineCSVFile();
        }

        $content = Storage::get($this->csvFile);
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

    protected function downloadOnlineCSVFile()
    {
        $path = Storage::put(
            'crepi.csv',
            $this->sendHTTPRequest()
        );
    }

    protected function sendHTTPRequest()
    {
        $url = "https://docs.google.com/spreadsheets/d"
            . "/1sLckqlEjip328Z78AqhPJYGl1Dl-sCMlp99QF5VIkT8"
            . "/gviz/tq?tqx=out:csv&sheet=Propositions";

        return Http::get($url)->body();
    }
}

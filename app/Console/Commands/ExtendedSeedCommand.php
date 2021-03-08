<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Database\ConnectionResolverInterface as Resolver;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ExtendedSeedCommand extends SeedCommand
{

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with records from online files';


    /**
     * Create a new database seed command instance.
     *
     * @param  \Illuminate\Database\ConnectionResolverInterface  $resolver
     * @return void
     */
    public function __construct(Resolver $resolver)
    {
        parent::__construct($resolver);

        $this->resolver = $resolver;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->downloadOnlineCSVFile();
        parent::handle();
    }

    /**
     * Download online file
     */
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

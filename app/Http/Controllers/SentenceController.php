<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

use App\Http\Requests\StoryRequest;
use App\Http\Requests\ContributionRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class SentenceController extends Controller
{
    public function index()
    {
        return Story::all();
    }

    public function store(StoryRequest $request)
    {
        $story = new Story();

        $story->populateWords($request->except('snapshot'))
            ->dealWithImage($request->only('snapshot'))
            ->save();


        Http::post('https://discord.com/api/webhooks/820706422470737920/F1j60dZhZutazgp9Uig95T6JMIo9U-D_6udOR7ec0l1ri-D1DmEdnWCmEdg7IV5ARbyd', [
            'content' => "Un nouveau grigri",
            'embeds' => [
                [
                    'title' => "Regarde ça",
                    'file' => [
                        'url' => env('APP_URL') . $story->file
                    ]
                    
                ]
            ],
        ]);


        return $story;
    }

    public function show($id)
    {
        $story = Story::find($id);
        return $story;
    }

    public function download($id)
    {
        $story = Story::find($id);
        $fileparts = pathinfo($story->file);

        return Storage::disk('stories')->download($fileparts['basename']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

use App\Http\Requests\StoryRequest;
use App\Http\Requests\ContributionRequest;

use Illuminate\Support\Facades\Storage;

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

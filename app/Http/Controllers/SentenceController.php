<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\Storage;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Story::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = new Story();

        $story->populateWords($request->except('snapshot'))
            ->dealWithImage($request->only('snapshot'))
            ->save();

        return $story;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
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

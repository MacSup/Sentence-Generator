<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillabe = ['file'];

    public function populateWords($words)
    {
        $this->adverb()->associate(Adverb::where('content', $words['adverb'])->first());
        $this->adjective()->associate(Adjective::where('content', $words['adjective'])->first());
        $this->situation()->associate(Situation::where('content', $words['situation'])->first());
        $this->objective()->associate(Objective::where('content', $words['objective'])->first());
        $this->solution()->associate(Solution::where('content', $words['solution'])->first());

        return $this;
    }

    public function dealWithImage($record, $file)
    {
        $path = putFile($file);

        $record->file = $path;

        return $this;
    }

    public function adverb()
    {
        return $this->belongsTo(Adverb::class);
    }

    public function adjective()
    {
        return $this->belongsTo(Adjective::class);
    }

    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }
}

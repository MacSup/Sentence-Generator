<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    use HasFactory;

    protected $fillabe = ['file'];

    public function populateWords($words)
    {
        $this->adverb()->associate(Adverb::find($words['adverb'])->first());
        $this->adjective()->associate(Adjective::find($words['adjective'])->first());
        $this->situation()->associate(Situation::find($words['situation'])->first());
        $this->complement()->associate(Complement::find($words['complement'])->first());
        $this->objective()->associate(Objective::find($words['objective'])->first());
        $this->solution()->associate(Solution::find($words['solution'])->first());

        return $this;
    }

    public function dealWithImage($file)
    {
        $path = Storage::putFile('public', $file);
        $this->file = $path;

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

    public function complement()
    {
        return $this->belongsTo(Complement::class);
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

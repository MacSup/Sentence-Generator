<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable = ['content'];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public static function randomelyChose(int $number)
    {
        $words = static::all();
        return $words->random($number);
    }
}

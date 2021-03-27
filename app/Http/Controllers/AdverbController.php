<?php

namespace App\Http\Controllers;

use App\Models\Adverb;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiRandom;

class AdverbController extends Controller
{
    protected $model = Adverb::class;
    
    use ApiRandom, ApiContribution;
    
    protected function getModel()
    {
        return $this->model;
    }
}

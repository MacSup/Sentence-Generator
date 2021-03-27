<?php

namespace App\Http\Controllers;

use App\Models\Situation;
use Illuminate\Http\Request;

class SituationController extends Controller
{
    protected $model = Situation::class;
    
    use ApiRandom;
}

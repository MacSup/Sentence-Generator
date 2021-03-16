<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complement;
use App\Http\Controllers\ApiRandom;

class ComplementController extends Controller
{
    protected $model = Complement::class;
    
    use ApiRandom;
}

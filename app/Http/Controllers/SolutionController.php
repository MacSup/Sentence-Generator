<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    protected $model = Solution::class;
    
    use ApiRandom, ApiContribution;

    protected function getModel()
    {
        return $this->model;
    }
}

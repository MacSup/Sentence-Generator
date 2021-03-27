<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    protected $model = Objective::class;
    
    use ApiRandom, ApiContribution;

    protected function getModel()
    {
        return $this->model;
    }
}

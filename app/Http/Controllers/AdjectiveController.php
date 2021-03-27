<?php

namespace App\Http\Controllers;

use App\Models\Adjective;
use Illuminate\Http\Request;

class AdjectiveController extends Controller
{
    protected $model = Adjective::class;
    
    use ApiRandom, ApiContribution;

    protected function getModel()
    {
        return $this->model;
    }
}

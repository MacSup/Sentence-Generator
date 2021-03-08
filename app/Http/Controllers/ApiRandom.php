<?php

namespace App\Http\Controllers;

trait ApiRandom
{
    public function random()
    {
        $class = $this->getModel();
        return $class::randomelyChose(5);
    }

    protected function getModel()
    {
        return $this->model;
    }
}

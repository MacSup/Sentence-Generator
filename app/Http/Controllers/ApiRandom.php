<?php

namespace App\Http\Controllers;

trait ApiRandom
{
    public function random(int $number)
    {
        $class = $this->getModel();
        return $class::randomelyChose($number);
    }

    protected function getModel()
    {
        return $this->model;
    }
}

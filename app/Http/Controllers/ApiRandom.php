<?php

namespace App\Http\Controllers;

trait ApiRandom
{
    public function random(int $number)
    {
        $class = $this->getModel();
        return $class::randomelyChose($number);
    }
}

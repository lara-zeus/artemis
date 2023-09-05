<?php

namespace LaraZeus\Artemis\Classes;

class RandomNumber
{
    public static function get($min, $max, $step = 5)
    {
        return mt_rand(floor($min / $step), floor($max / $step)) * $step;
    }
}

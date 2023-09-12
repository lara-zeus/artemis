<?php

namespace LaraZeus\Artemis\Classes;

class RandomNumber
{
    public static function get(int $min, int $max, int $step = 5): int
    {
        return mt_rand($min / $step, $max / $step) * $step;
    }
}

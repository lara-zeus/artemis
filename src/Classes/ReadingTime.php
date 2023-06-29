<?php

namespace LaraZeus\Artemis\Classes;

class ReadingTime
{
    public static function readingTime($post, $fullText = false): int|string
    {
        $word = str_word_count(strip_tags($post));
        $m = floor($word / 200);

        if (! $fullText) {
            return (int) $m;
        }

        return $m.' ' . __('minute') .($m == 1 ? '' : 's');
    }
}

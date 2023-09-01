<?php

namespace LaraZeus\Artemis\Concerns;

class ReadingTime
{
    public static function readingTime(string $post, bool $fullText = false): int | string
    {
        $word = str_word_count(strip_tags($post));
        $m = floor($word / 200);

        if (! $fullText) {
            return (int) $m;
        }

        return $m . ' ' . __('minute') . ($m == 1 ? '' : 's');
    }
}

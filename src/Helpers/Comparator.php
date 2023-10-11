<?php

namespace App\Helpers;

/**
 * Sorting an assoc array by column
 */
class Comparator
{
    private string $key;
    private int $order;

    public function __construct(string $key, $order = 'asc')
    {
        $this->key = $key;
        $this->order = ($order === 'desc') ? -1 : 1;
    }

    public function __invoke($a, $b)
    {
        $k = mb_strtolower($a[$this->key]) <=> mb_strtolower($b[$this->key]);
        return ($k === 0) ? $k : $this->order * $k;
    }
}
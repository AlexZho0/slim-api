<?php

namespace App\Helpers;

/**
 * Sorting an assoc array by column
 */
class Comparator
{
    private string $key;
    private int $order;

    /**
     * @param string $key
     * @param string $order
     */
    public function __construct(string $key, string $order = 'asc')
    {
        $this->key = $key;
        $this->order = ($order === 'desc') ? -1 : 1;
    }

    /**
     * @param array $a
     * @param array $b
     * 
     * @return int
     */
    public function __invoke(array $a, array $b)
    {
        $k = mb_strtolower($a[$this->key]) <=> mb_strtolower($b[$this->key]);
        return ($k === 0) ? $k : $this->order * $k;
    }
}
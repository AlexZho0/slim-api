<?php

namespace App\Contracts;

/**
 * Available option to convert the class instance  into array
 */
interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}
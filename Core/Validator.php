<?php

namespace Core;

abstract class Validator
{
    public static function string(string $value, int $min, int $max): bool {
        $len = strlen($value);

        return $len >= $min && $len <= $max;
    }
}


<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const MAP = [
        "auth" => Auth::class,
        "guest" => Guest::class,
    ];

    public function resolve(string|null $key) {
        if(!$key) return;

        if(!isset(static::MAP[$key])) {
            throw new Exception("There is no middleware named $key");
        }

        (new (static::MAP[$key]))->handle();
    }
}
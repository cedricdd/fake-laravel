<?php

namespace Core;

use Closure;
use Exception;

class Container
{
    protected array $bindings = [];

    public function bind(string $key, Closure $resolver): void {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key): mixed {
        if(isset($this->bindings[$key])) return call_user_func($this->bindings[$key]);
        else throw new Exception("No matching binding found for $key");
    }
}
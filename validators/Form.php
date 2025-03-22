<?php

namespace Validators;

class Form 
{
    protected array $errors = [];

    public function errors(): array {
        return $this->errors;
    }

    public function error(string $name, string $message): void {
        $this->errors[$name] = $message;
    }
}
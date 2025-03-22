<?php

namespace Validators;

use Core\Session;

class Form 
{
    protected array $errors = [];
    protected array $attributes = [];

    public function errors(): array {
        return $this->errors;
    }

    public function error(string $name, string $message): static {
        $this->errors[$name] = $message;

        return $this;
    }

    public function validate(array $attributes): static {
        $this->attributes = $attributes;

        if(count($this->errors)) {
            $this->throwError();
        }

        return $this;
    }

    public function throwError(): never {
        Session::setFlash("errors", $this->errors);
        Session::setFlash("old", $this->attributes);

        redirect($_SERVER["HTTP_REFERER"]);
    }
}
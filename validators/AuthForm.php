<?php

namespace Validators;

use Core\Validator;

class AuthForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool {
        if(! Validator::email($email)) {
            $this->errors["email"] = "Please enter a valid email address.";
        }
        
        if(! Validator::string($password, 7, 255)) {
            $this->errors["password"] = "Please enter a valid password [7-255] characters";
        }

        return empty($this->errors);
    }

    public function errors(): array {
        return $this->errors;
    }
}
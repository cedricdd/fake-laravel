<?php

namespace Validators;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool {
        if(! Validator::email($email)) {
            $this->errors["email"] = "Please enter a valid email address.";
        }
        
        if(! Validator::string($password)) {
            $this->errors["password"] = "Please enter a valid password.";
        }

        return empty($this->errors);
    }

    public function errors(): array {
        return $this->errors;
    }
}
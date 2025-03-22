<?php

namespace Validators;

use Core\Validator;

class LoginForm extends Form
{
    public function validate(array $attributes): static {
        if(! Validator::email($attributes["email"])) {
            $this->errors["email"] = "Please enter a valid email address.";
        }
        
        if(! Validator::string($attributes["password"])) {
            $this->errors["password"] = "Please enter a valid password.";
        }

        return parent::validate($attributes);
    }
}
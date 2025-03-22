<?php

namespace Validators;

use Core\Validator;

class AuthForm extends Form
{
    public function validate(array $attributes): static {
        if(! Validator::email($attributes["email"])) {
            $this->errors["email"] = "Please enter a valid email address.";
        }
        
        if(! Validator::string($attributes["password"], 7, 255)) {
            $this->errors["password"] = "Please enter a valid password [7-255] characters";
        }

        return parent::validate($attributes);
    }
}
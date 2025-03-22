<?php

namespace Validators;

use Core\Validator;

class NoteForm extends Form
{
    public function validate(array $attributes): static {
        if(! Validator::string($attributes["body"], 1, 1000)) {
            $this->errors['body'] = "A body of no more than 1.000 characters is required! (Currently " . strlen($attributes["body"]) . " characters)";
        } 

        return parent::validate($attributes);
    }
}
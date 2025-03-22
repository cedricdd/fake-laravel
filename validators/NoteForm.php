<?php

namespace Validators;

use Core\Validator;

class NoteForm extends Form
{
    public function validate(string $body): bool {
        if(! Validator::string($body, 1, 1000)) {
            $this->errors['body'] = "A body of no more than 1.000 characters is required! (Currently " . strlen($body) . " characters)";
        } 

        return empty($this->errors);
    }
}
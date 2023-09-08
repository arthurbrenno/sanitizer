<?php

namespace Brc\Inspector\Validators;

use Brc\Inspector\Sanitizers\StringSanitizer;

class EmailValidator implements \Brc\Inspector\Contracts\Validatable {
    public static function validate($input) {
        if (!StringSanitizer::sanitize($input)) {
            return false;
        }

        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

}
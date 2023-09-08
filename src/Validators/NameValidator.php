<?php

namespace Brc\Inspector\Validators;
use Brc\Inspector\Sanitizers\StringSanitizer;

class NameValidator implements \Brc\Inspector\Contracts\Validatable {
    public static function validate($input) {
        if (!StringSanitizer::sanitize($input)) {
            return false;
        }

        return filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array(
                "regexp" => "/^[a-zA-Z]+$/"
            )
        ));
    }
}
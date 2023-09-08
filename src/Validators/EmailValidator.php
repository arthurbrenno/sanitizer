<?php

namespace Brc\Inspector\Validators;

class EmailValidator implements \Brc\Inspector\Contracts\Validatable {
    public static function validate($input) {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

}
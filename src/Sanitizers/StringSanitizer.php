<?php

namespace Brc\Inspector\Sanitizers;

use Brc\Inspector\Constants\RuleSet;

class StringSanitizer implements \Brc\Inspector\Contracts\Sanitizeable {

    /**
     * Sanitizes a string.
     * @param $input
     * @return bool|mixed The sanitized input, or FALSE if it fails.
     */
    public static function sanitize($input) {
        if (!isset($input)) {
            return false;
        }

        if (!is_string($input)) {
            return false;
        }

        $length = strlen($input);

        if($length > RuleSet::MAX_STRING_LENGTH || $length < RuleSet::MIN_STRING_LENGTH) {
            return false;
        }


        return filter_var($input, FILTER_SANITIZE_STRING);

    }
}
<?php

namespace Brc\Inspector\Validators;

use Brc\Inspector\Constants\RuleSet;
use Brc\Inspector\Sanitizers\StringSanitizer;

class PasswordValidator implements \Brc\Inspector\Contracts\Validatable {
    public static function validate($input) {
        if (!is_string($input)) {
            return false;
        }

        $specialCharacters = 0;
        $numbers = 0;
        $lowerCase = 0;
        $upperCase = 0;
        $length = strlen($input);

        for ($i = 0; i < $length; ++$i) {
            $character = $input[$i];

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $character) && $specialCharacters < 1) {
                ++$specialCharacters;
            }

            if (preg_match('/[0-9]/', $character) && $numbers < 1) {
                ++$numbers;
            }

            if (preg_match('/[a-z]/', $character) && $lowerCase < 1) {
                ++$lowerCase;
            }

            if (preg_match('/[A-Z]/', $character) && $upperCase < 1) {
                ++$upperCase;
            }

        }

        if ($specialCharacters < 1 || $numbers < 1 || $lowerCase < 1 || $upperCase < 1 || $length < RuleSet::MIN_PASSWORD_LENGTH) {
            return false;
        }

        return true;
    }
}
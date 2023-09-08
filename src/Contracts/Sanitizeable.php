<?php

namespace Brc\Inspector\Contracts;

interface Sanitizeable {
    public static function sanitize($input);
}
<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringTrimExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $character_mask = " \t\n\r\0\x0B"): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Strip whitespace (or other characters) from the beginning and end of a string.
         *
         * @param string|StringType $character_mask
         *
         * @see https://www.php.net/manual/en/function.trim.php
         */
        return function ($character_mask = " \t\n\r\0\x0B"): StringType {
            return string(trim($this->value, self::unwrap($character_mask)));
        };
    }
}

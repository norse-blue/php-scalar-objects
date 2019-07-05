<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringTrimRightExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $character_mask = " \t\n\r\0\x0B"): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Strip whitespace (or other characters) from the end of a string.
         *
         * @param string|StringType $character_mask
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         *
         * @see https://www.php.net/manual/en/function.rtrim.php
         */
        return function ($character_mask = " \t\n\r\0\x0B"): StringType {
            return string(rtrim($this->value, self::unwrap($character_mask)));
        };
    }
}

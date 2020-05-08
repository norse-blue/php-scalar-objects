<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Exceptions\String\MacSeparatorLengthException;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringIsMacExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $separator = null): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a MAC address.
         *
         * @param string|StringType|null $separator
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($separator = null): BoolType {
            if ($separator !== null && string($separator)->length()->equals(1)->isFalse()) {
                throw new MacSeparatorLengthException('Separator must be exactly one character long.');
            }

            return bool(
                filter_var(
                    $this->value,
                    FILTER_VALIDATE_MAC,
                    $separator ? ['options' => ['separator' => self::unwrap($separator)]] : null
                ) !== false
            );
        };
    }
}

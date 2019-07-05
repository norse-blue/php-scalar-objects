<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringRegexQuoteExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType|null $delimiter = null): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Quote a regex string.
         *
         * @param string|StringType|null $delimiter
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         *
         * @see https://www.php.net/manual/en/function.preg-quote.php
         */
        return function ($delimiter = null): StringType {
            if ($delimiter !== null) {
                return string(preg_quote($this->value, (string)self::unwrap($delimiter)));
            }

            return string(preg_quote($this->value));
        };
    }
}

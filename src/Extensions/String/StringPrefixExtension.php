<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringPrefixExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $prefix): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringType $prefix
         */
        return function ($prefix): StringType {
            return string($prefix . $this->value);
        };
    }
}

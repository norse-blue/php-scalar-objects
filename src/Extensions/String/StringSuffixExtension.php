<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringSuffixExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $suffix): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringType $suffix
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($suffix): StringType {
            return string($this->value . $suffix);
        };
    }
}

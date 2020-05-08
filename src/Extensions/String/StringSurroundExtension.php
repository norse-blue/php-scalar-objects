<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringSurroundExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $prefix, string|StringType|null $suffix = null): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringType $prefix
         * @param string|StringType|null $suffix
         */
        return function ($prefix, $suffix = null): StringType {
            $surrounded = $prefix . $this->value;

            $surrounded .= $suffix === null ? $prefix : $suffix;

            return string($surrounded);
        };
    }
}

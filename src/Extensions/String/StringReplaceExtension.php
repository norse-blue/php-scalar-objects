<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringReplaceExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $search, string|StringType $replace): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Replace all occurrences of the search string with the replacement string.
         *
         * @param string|StringType $search
         * @param string|StringType $replace
         */
        return function ($search, $replace): StringType {
            return string(str_replace($search, $replace, $this->value, $count));
        };
    }
}

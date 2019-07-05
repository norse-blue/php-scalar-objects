<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringReplaceFirstExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $search, string|StringType $replace): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Replace the first occurrence of a given value in the string.
         *
         * @param string|StringType $search
         * @param string|StringType $replace
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($search, $replace): StringType {
            $subject = $this->value;
            $search = self::unwrap($search);

            if ($search === '') {
                return string($subject);
            }

            $position = strpos($subject, $search);

            if ($position !== false) {
                $replace = self::unwrap($replace);

                return string(substr_replace($subject, $replace, $position, strlen($search)));
            }

            return string($subject);
        };
    }
}

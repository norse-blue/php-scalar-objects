<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class StringContainsExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType|array $needles): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string contains a given substring.
         *
         * @param string|StringType|array $needles
         *
         * @return BoolType
         */
        return function ($needles): BoolType {
            $haystack = $this->value;

            foreach ((array)$needles as $needle) {
                $needle = self::unwrap($needle);

                if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}

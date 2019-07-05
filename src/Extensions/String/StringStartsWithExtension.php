<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringStartsWithExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType|array $needles): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string starts with a given substring.
         *
         * @param string|StringType|array $needles
         *
         * @return BoolType
         */
        return function ($needles): BoolType {
            foreach ((array)$needles as $needle) {
                $needle = self::unwrap($needle);

                if (is_string($needle) && $needle !== ''
                    && $this->substr(0, string($needle)->length()->value)->equals($needle)->isTrue()
                ) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}

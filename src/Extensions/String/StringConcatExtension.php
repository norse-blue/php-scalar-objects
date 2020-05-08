<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringConcatExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType ...$strings): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Concatenates the given strings.
         *
         * @param string|StringType ...$strings
         */
        return function (...$strings): StringType {
            $value = $this->value;
            foreach ($strings as $string) {
                $string = self::unwrap($string);

                $value .= $string;
            }

            return string($value);
        };
    }
}

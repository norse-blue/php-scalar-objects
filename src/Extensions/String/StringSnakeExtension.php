<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringSnakeExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $delimiter): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Convert a string to snake case.
         *
         * @param string|StringType $delimiter
         */
        return function ($delimiter = '_'): StringType {
            $value = $this->value;

            if (! ctype_lower($value)) {
                $delimiter = self::unwrap($delimiter);

                $value = preg_replace('/\s+/u', '', ucwords($value)) ?? '';
                $value = preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value) ?? '';

                return string($value)->lower();
            }

            return string($value);
        };
    }
}

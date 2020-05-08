<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringStartExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $prefix): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringType $prefix
         */
        return function ($prefix): StringType {
            $value = $this->value;
            $prefix = self::unwrap($prefix);
            $quoted = preg_quote($prefix, '/');

            return string($prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value));
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringFinishExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $cap): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Cap the value with a single instance of a given value.
         *
         * @param string|StringType $cap
         */
        return function ($cap): StringType {
            $value = $this->value;
            $cap = self::unwrap($cap);

            $quoted = preg_quote($cap, '/');

            return string(preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap);
        };
    }
}

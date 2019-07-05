<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringAfterExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $search): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Return the remainder of the value after a given value.
         *
         * @param string|StringType $search
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($search): StringType {
            $value = $this->value;
            $search = self::unwrap($search);

            return string($search === '' ? $value : array_reverse(explode($search, $value, 2))[0]);
        };
    }
}

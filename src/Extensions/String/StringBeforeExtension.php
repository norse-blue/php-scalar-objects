<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringBeforeExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $search): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get the portion of the value before a given value.
         *
         * @param string|StringType $search
         */
        return function ($search): StringType {
            $value = $this->value;
            $search = self::unwrap($search);

            return string($search === '' ? $value : explode($search, $value)[0]);
        };
    }
}

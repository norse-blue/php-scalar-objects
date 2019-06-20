<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Scalars\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class NumberEqualsExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumberType $number): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Compare the Type against a given value for equality.
         *
         * @param int|float|NumberType $number
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         */
        return function ($number): BoolType {
            return bool((float)$this->compare($number)->value === 0.0);
        };
    }
}

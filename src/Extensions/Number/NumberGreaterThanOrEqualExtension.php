<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class NumberGreaterThanOrEqualExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumberType $number): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is greater than or equal to the given number.
         *
         * @param int|float|NumberType $number
         */
        return function ($number): BoolType {
            return bool($this->value >= self::unwrap($number));
        };
    }
}

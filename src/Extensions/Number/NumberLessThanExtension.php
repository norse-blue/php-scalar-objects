<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class NumberLessThanExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumberType $number): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is less than the given number.
         *
         * @param int|float|NumberType $number
         */
        return function ($number): BoolType {
            return bool($this->value < self::unwrap($number));
        };
    }
}

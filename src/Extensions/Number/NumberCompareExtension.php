<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\Number;

final class NumberCompareExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumberType $number): NumberType
     */
    public function __invoke(): callable
    {
        /**
         * Compare the Type against a given Number value.
         *
         * @param int|float|NumberType $number
         *
         * @return \NorseBlue\ScalarObjects\Types\NumberType
         */
        return function ($number): NumberType {
            $number = self::unwrap($number);

            return number($this->value - $number);
        };
    }
}

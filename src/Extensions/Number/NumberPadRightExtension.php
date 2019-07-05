<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ScalarObjects\Types\StringType;

final class NumberPadRightExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $pad_length, string|StringType $pad_string = '0'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get a right padded string using the Number value
         *
         * @param int|IntType $pad_length
         * @param string|StringType $pad_string
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($pad_length, $pad_string = '0'): StringType {
            return $this->pad($pad_length, $pad_string, STR_PAD_RIGHT);
        };
    }
}

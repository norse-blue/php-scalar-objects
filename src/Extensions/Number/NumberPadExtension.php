<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class NumberPadExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get a padded string using the Number value.
         *
         * @param int|IntType $pad_length
         * @param string|StringType $pad_string
         * @param int|IntType $pad_side
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($pad_length, $pad_string = '0', $pad_side = STR_PAD_BOTH): StringType {
            return string(
                str_pad(
                    (string)$this->value,
                    IntType::unwrap($pad_length),
                    StringType::unwrap($pad_string),
                    IntType::unwrap($pad_side)
                )
            );
        };
    }
}

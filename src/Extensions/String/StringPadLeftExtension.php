<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

final class StringPadLeftExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $pad_length, string|StringType $pad_string = '0'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get a left padded string using the numeric value.
         *
         * @param int|IntType $pad_length
         * @param string|StringType $pad_string
         */
        return function ($pad_length, $pad_string = ' '): StringType {
            return $this->pad($pad_length, $pad_string, STR_PAD_LEFT);
        };
    }
}

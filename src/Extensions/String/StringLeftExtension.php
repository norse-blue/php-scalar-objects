<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\int;

final class StringLeftExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $length): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get the left part of the string until the given length.
         *
         * @param int|IntType $length
         */
        return function ($length): StringType {
            return $this->substr(0, int($length)->abs()->toInt()->value);
        };
    }
}

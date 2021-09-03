<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\int;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringRightExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $length): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Get the right part of the string until the given length.
         *
         * @param int|IntType $length
         */
        return function ($length): StringType {
            $length = int($length);
            if ($length->equals(0)->isTrue()) {
                return string();
            }

            return $this->substr(-int($length)->abs()->toInt()->value);
        };
    }
}

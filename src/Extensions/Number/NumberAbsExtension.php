<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Scalars\Number;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\Number;

final class NumberAbsExtension extends NumberType implements ExtensionMethod
{
    /**
     * @return callable(): NumberType
     */
    public function __invoke(): callable
    {
        /**
         * Get the absolute value.
         *
         * @return \NorseBlue\ScalarObjects\Types\NumberType
         */
        return function (): NumberType {
            return number(abs($this->value));
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects;

use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ValueObjects\Immutable\ImmutableSimpleValueObject;
use function NorseBlue\ScalarObjects\Functions\bool;

abstract class PrimitiveType extends ImmutableSimpleValueObject
{
    /**
     * Check if the value is equal to the given value.
     *
     * The comparison should take the type into account only
     * if the given value is an object and disregard it if its
     * a primitive value (bool, float, int or string).
     *
     * @param mixed $other The value to compare to.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType Returns true if $other
     * is equal, false otherwise.
     */
    final public function equals($other): BoolType
    {
        if (is_object($other) && !$other instanceof static) {
            return bool(false);
        }

        return bool($this->value === static::unwrap($other));
    }
}

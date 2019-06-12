<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use function NorseBlue\ScalarObjects\Functions\bool;

/**
 * @property int|float $value
 */
abstract class NumberType extends PrimitiveType
{
    /**
     * @inheritDoc
     */
    final protected function isValid($value): bool
    {
        return is_int($value) || is_float($value) || $value instanceof self;
    }

    /**
     * Check if the value is zero.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    final public function isZero(): BoolType
    {
        return bool($this->value === 0 || $this->value === 0.0);
    }
}

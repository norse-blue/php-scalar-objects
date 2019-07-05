<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\Number;

use NorseBlue\ScalarObjects\Types\BoolType;
use function NorseBlue\ScalarObjects\Functions\bool;

trait NumberCheckMethods
{
    /**
     * Check if the value is a float.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    final public function isFloat(): BoolType
    {
        return bool(is_float($this->value));
    }

    /**
     * Check if the value is an int.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    final public function isInt(): BoolType
    {
        return bool(is_int($this->value));
    }

    /**
     * @inheritDoc
     */
    final public function isValid($value): bool
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

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\float;
use function NorseBlue\ScalarObjects\Functions\int;

/**
 * @property int|float $value
 */
class NumberType extends PrimitiveType
{
    /**
     * @param int|float|self $value
     */
    public function __construct($value = 0)
    {
        parent::__construct($value ?? null);
    }

    /**
     * @inheritDoc
     */
    final public function isValid($value): bool
    {
        return is_int($value) || is_float($value) || $value instanceof self;
    }

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
     * Check if the value is zero.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    final public function isZero(): BoolType
    {
        return bool($this->value === 0 || $this->value === 0.0);
    }

    /**
     * Convert the value to float.
     *
     * @return \NorseBlue\ScalarObjects\Types\FloatType
     */
    final public function toFloat(): FloatType
    {
        return float($this->value);
    }

    /**
     * Convert the value to int.
     *
     * @return \NorseBlue\ScalarObjects\Types\IntType
     */
    final public function toInt(): IntType
    {
        return int($this->value);
    }
}

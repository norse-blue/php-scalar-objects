<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use function NorseBlue\ScalarObjects\Functions\int;

/**
 * @property float $value
 */
final class FloatType extends NumberType
{
    /**
     * Create a new instance.
     *
     * @param int|float|NumberType $value
     */
    public function __construct($value = 0.0)
    {
        if (!$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((float)self::unwrap($value));
    }

    /**
     * Convert the value to int.
     *
     * @return \NorseBlue\ScalarObjects\Types\IntType
     */
    public function toInt(): IntType
    {
        return int($this->value);
    }
}

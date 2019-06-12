<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use function NorseBlue\ScalarObjects\Functions\float;

/**
 * @property int $value
 */
final class IntType extends NumericType
{
    /**
     * Create a new instance.
     *
     * @param int|float|NumericType $value
     */
    public function __construct($value = 0)
    {
        if (!$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((int)self::unwrap($value));
    }

    /**
     * Convert the value to float.
     *
     * @return \NorseBlue\ScalarObjects\Types\FloatType
     */
    public function toFloat(): FloatType
    {
        return float($this->value);
    }
}

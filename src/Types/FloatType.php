<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

/**
 * Float type as object.
 *
 * @property float $value
 */
class FloatType extends NumberType
{
    /**
     * Create a new instance.
     *
     * @param int|float|NumberType $value
     */
    public function __construct($value = 0.0)
    {
        if (! $this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((float) self::unwrap($value));
    }
}

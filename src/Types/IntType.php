<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

/**
 * @property int $value
 */
final class IntType extends NumberType
{
    /**
     * Create a new instance.
     *
     * @param int|float|NumberType $value
     */
    public function __construct($value = 0)
    {
        if (!$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((int)self::unwrap($value));
    }
}

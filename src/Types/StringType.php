<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use function NorseBlue\ScalarObjects\Functions\bool;

/**
 * @property string $value
 */
final class StringType extends PrimitiveType
{
    /**
     * Create a new instance.
     *
     * @param string|StringType $value
     */
    public function __construct($value = '')
    {
        if (!$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((string)self::unwrap($value));
    }

    /**
     * @inheritDoc
     */
    public function isValid($value): bool
    {
        return is_string($value) || $value instanceof self;
    }

    /**
     * Check if the value is empty.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    public function isEmpty(): BoolType
    {
        return bool($this->value === '');
    }
}

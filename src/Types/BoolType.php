<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

/**
 * @property bool $value
 */
final class BoolType extends PrimitiveType
{
    /**
     * Create a new instance.
     *
     * @param bool|BoolType $value
     */
    public function __construct($value = false)
    {
        if (!$this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((bool)$value);
    }

    /**
     * @inheritDoc
     */
    public function isValid($value): bool
    {
        return is_bool($value) || $value instanceof self;
    }

    /**
     * Check if the value is false.
     *
     * @return bool True if value is false, false otherwise.
     */
    public function isFalse(): bool
    {
        return $this->value === false;
    }

    /**
     * Check if the value is true.
     *
     * @return bool True if value is true, false otherwise.
     */
    public function isTrue(): bool
    {
        return $this->value === true;
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

/**
 * Primitive bool type as an object.
 *
 * @property bool $value
 *
 * @method self and(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolAndExtension
 * @method self equals(bool|self $bool) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolEqualsExtension
 * @method self not() @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolNotExtension
 * @method self or(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolOrExtension
 * @method self xor(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolXorExtension
 */
class BoolType extends PrimitiveType
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
     * Check if the value is false.
     *
     * @return bool True if value is false, false otherwise.
     */
    final public function isFalse(): bool
    {
        return $this->value === false;
    }

    /**
     * Check if the value is true.
     *
     * @return bool True if value is true, false otherwise.
     */
    final public function isTrue(): bool
    {
        return $this->value === true;
    }

    /**
     * @inheritDoc
     */
    final public function isValid($value): bool
    {
        return is_bool($value) || $value instanceof self;
    }
}

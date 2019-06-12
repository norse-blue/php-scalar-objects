<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;

/**
 * @property string $value
 */
final class StringType extends PrimitiveType
{
    /**
     * @inheritDoc
     */
    protected function isValid($value): bool
    {
        return is_string($value) || $value instanceof self;
    }
}

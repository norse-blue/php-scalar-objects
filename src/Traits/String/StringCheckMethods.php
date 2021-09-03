<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\String;

use NorseBlue\ScalarObjects\Types\BoolType;

use function NorseBlue\ScalarObjects\Functions\bool;

trait StringCheckMethods
{
    /**
     * Check if the value is empty.
     */
    final public function isEmpty(): BoolType
    {
        return bool($this->value === '');
    }

    final public function isValid(mixed $value): bool
    {
        return is_string($value) || $value instanceof self;
    }
}

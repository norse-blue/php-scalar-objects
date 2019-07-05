<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\String;

use NorseBlue\ScalarObjects\Types\BoolType;
use function NorseBlue\ScalarObjects\Functions\bool;

trait StringCheckMethods
{
    /**
     * Check if the value is empty.
     *
     * @return \NorseBlue\ScalarObjects\Types\BoolType
     */
    final public function isEmpty(): BoolType
    {
        return bool($this->value === '');
    }

    /**
     * @inheritDoc
     */
    final public function isValid($value): bool
    {
        return is_string($value) || $value instanceof self;
    }
}

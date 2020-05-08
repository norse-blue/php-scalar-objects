<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;

/**
 * Create a new IntType object.
 *
 * @param int|float|NumberType $value
 */
function int($value = 0): IntType
{
    return new IntType($value);
}

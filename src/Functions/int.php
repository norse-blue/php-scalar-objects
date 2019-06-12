<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumericType;

/**
 * Create a new IntType object.
 *
 * @param int|float|NumericType $value
 *
 * @return \NorseBlue\ScalarObjects\Types\IntType
 */
function int($value = 0): IntType
{
    return new IntType($value);
}
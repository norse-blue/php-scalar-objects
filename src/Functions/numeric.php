<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumericType;

/**
 * Create a new IntType object.
 *
 * @param int|float|NumericType $value
 *
 * @return \NorseBlue\ScalarObjects\Types\NumericType
 */
function numeric($value = 0): NumericType
{
    if (is_float($value)) {
        return new FloatType($value);
    }

    return new IntType($value);
}

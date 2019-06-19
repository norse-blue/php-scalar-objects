<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;

/**
 * Create a new IntType object.
 *
 * @param int|float|NumberType $value
 *
 * @return \NorseBlue\ScalarObjects\Types\NumberType
 */
function number($value = 0): NumberType
{
    if (is_float($value)) {
        return new FloatType($value);
    }

    return new IntType($value);
}

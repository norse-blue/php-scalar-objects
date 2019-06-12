<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\NumberType;

/**
 * Create a new FloatType object.
 *
 * @param int|float|NumberType $value
 *
 * @return \NorseBlue\ScalarObjects\Types\FloatType
 */
function float($value = 0.0): FloatType
{
    return new FloatType($value);
}

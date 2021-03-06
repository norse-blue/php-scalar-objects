<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\BoolType;

/**
 * Create a new BoolType object.
 *
 * @param bool|BoolType $value
 */
function bool($value = false): BoolType
{
    return new BoolType($value);
}

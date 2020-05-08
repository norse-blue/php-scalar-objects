<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Functions;

use NorseBlue\ScalarObjects\Types\StringType;

/**
 * Create a new StringType object.
 *
 * @param string|StringType $value
 */
function string($value = ''): StringType
{
    return new StringType($value);
}

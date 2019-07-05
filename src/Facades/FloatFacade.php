<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\NumberType;

/**
 * Facade to class FloatType.
 *
 * @method static FloatType abs(int|float|NumberType $value)
 * @method static FloatType compare(int|float|NumberType $value, int|float|NumberType $number)
 * @method static FloatType create(int|float|NumberType $value)
 * @method static FloatType equals(int|float|NumberType $value, int|float|NumberType $number)
 */
final class FloatFacade extends NumberFacade
{
    /** @inheritDoc */
    protected static $target_class = FloatType::class;
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ScalarObjects\Types\StringType;

/**
 * Facade to class IntType.
 *
 * @method static IntType abs(int|IntType $value)
 * @method static IntType compare(int|IntType $value, int|float|NumberType $number)
 * @method static IntType create(int|IntType $value)
 * @method static IntType equals(int|IntType $value, int|float|NumberType $number)
 * @method static BoolType greaterThan(int|IntType $value, int|float|NumberType $number)
 * @method static BoolType greaterThanOrEqual(int|IntType $value, int|float|NumberType $number)
 * @method static BoolType lessThan(int|IntType $value, int|float|NumberType $number)
 * @method static BoolType lessThanOrEqual(int|IntType $value, int|float|NumberType $number)
 * @method static StringType pad(int|IntType $value, int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH)
 * @method static StringType padLeft(int|IntType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method static StringType padRight(int|IntType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 */
final class IntFacade extends NumberFacade
{
    /** @inheritDoc */
    protected static $target_class = IntType::class;
}

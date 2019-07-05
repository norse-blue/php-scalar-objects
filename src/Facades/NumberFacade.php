<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ScalarObjects\Types\StringType;

/**
 * Facade to class NumberType.
 *
 * @method static NumberType abs(int|float|NumberType $value)
 * @method static NumberType compare(int|float|NumberType $value, int|float|NumberType $number)
 * @method static NumberType create(int|float|NumberType $value)
 * @method static NumberType equals(int|float|NumberType $value, int|float|NumberType $number)
 * @method static BoolType greaterThan(int|float|NumberType $value, int|float|NumberType $number)
 * @method static BoolType greaterThanOrEqual(int|float|NumberType $value, int|float|NumberType $number)
 * @method static BoolType lessThan(int|float|NumberType $value, int|float|NumberType $number)
 * @method static BoolType lessThanOrEqual(int|float|NumberType $value, int|float|NumberType $number)
 * @method static StringType pad(int|float|NumberType $value, int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH)
 * @method static StringType padLeft(int|float|NumberType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method static StringType padRight(int|float|NumberType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 */
class NumberFacade extends BaseFacade
{
    /** @inheritDoc */
    protected static $target_class = NumberType::class;
}

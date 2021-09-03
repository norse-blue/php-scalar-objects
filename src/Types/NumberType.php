<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use NorseBlue\ScalarObjects\PrimitiveType;
use NorseBlue\ScalarObjects\Traits\Number\NumberCheckMethods;
use NorseBlue\ScalarObjects\Traits\Number\NumberConversionMethods;

use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\number;

/**
 * Number type as object.
 *
 * @property int|float $value
 *
 * @method self abs()
 * @method BoolType greaterThan(int|float|NumberType $number)
 * @method BoolType greaterThanOrEqual(int|float|NumberType $number)
 * @method BoolType lessThan(int|float|NumberType $number)
 * @method BoolType lessThanOrEqual(int|float|NumberType $number)
 * @method StringType pad(int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH)
 * @method StringType padLeft(int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method StringType padRight(int|IntType $pad_length, string|StringType $pad_string = '0')
 *
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberAbsExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberCompareExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberGreaterThanExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberGreaterThanOrEqualExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberLessThanExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberLessThanOrEqualExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberPadExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberPadLeftExtension
 * @see \NorseBlue\ScalarObjects\Extensions\Number\NumberPadRightExtension
 */
class NumberType extends PrimitiveType
{
    use NumberCheckMethods;
    use NumberConversionMethods;

    /**
     * @param int|float|self $value
     */
    public function __construct($value = 0)
    {
        parent::__construct($value ?? null);
    }

    /**
     * Compare against another number.
     */
    final public function compare(int|float|NumberType $other): NumberType
    {
        $other = self::unwrap($other);

        return number($this->value - $other);
    }

    final public function equals($other): BoolType
    {
        if (is_object($other) && ! is_subclass_of($other, self::class)) {
            return bool(false);
        }

        return bool((float) $this->compare($other)->value === 0.0);
    }
}

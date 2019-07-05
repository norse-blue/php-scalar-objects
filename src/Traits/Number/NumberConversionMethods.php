<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\Number;

use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use function NorseBlue\ScalarObjects\Functions\float;
use function NorseBlue\ScalarObjects\Functions\int;

trait NumberConversionMethods
{
    /**
     * Convert the value to float.
     *
     * @return \NorseBlue\ScalarObjects\Types\FloatType
     */
    final public function toFloat(): FloatType
    {
        return float($this->value);
    }

    /**
     * Convert the value to int.
     *
     * @return \NorseBlue\ScalarObjects\Types\IntType
     */
    final public function toInt(): IntType
    {
        return int($this->value);
    }
}

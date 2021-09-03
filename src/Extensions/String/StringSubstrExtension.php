<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringSubstrExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $start, int|IntType|null $length = null): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Returns the portion of string specified by the start and length parameters.
         *
         * @param int|IntType $start
         * @param int|IntType|null $length
         */
        return function ($start, $length = null): StringType {
            $string = $this->value;
            $start = IntType::unwrap($start);
            $length = IntType::unwrap($length);

            return string(mb_substr($string, $start, $length, 'UTF-8'));
        };
    }
}

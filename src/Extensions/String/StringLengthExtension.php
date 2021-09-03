<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\int;

final class StringLengthExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $encoding = null): IntType
     */
    public function __invoke(): callable
    {
        /**
         * Return the length of the given string.
         *
         * @param string|StringType $encoding
         */
        return function ($encoding = null): IntType {
            $value = $this->value;

            if ($encoding) {
                $encoding = self::unwrap($encoding);

                return int(mb_strlen($value, $encoding));
            }

            return int(mb_strlen($value));
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringLimitExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $limit = 100, string|StringType $end = '...'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Limit the number of characters in a string.
         *
         * @param int|IntType $limit
         * @param string|StringType $end
         */
        return function ($limit = 100, $end = '...'): StringType {
            $value = $this->value;
            $limit = IntType::unwrap($limit);
            $end = self::unwrap($end);

            if (mb_strwidth($value, 'UTF-8') <= $limit) {
                return string($value);
            }

            return string(rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end);
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringWordsExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $words = 100, string|StringType $end = '...'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Limit the number of words in a string.
         *
         * @param int|IntType $words
         * @param string|StringType $end
         */
        return function ($words = 100, $end = '...'): StringType {
            $value = $this->value;
            $words = IntType::unwrap($words);

            preg_match('/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches);

            if (! isset($matches[0]) || string($value)->length()->equals(string($matches[0])->length())->isTrue()) {
                return string($value);
            }

            $end = self::unwrap($end);

            return string(rtrim($matches[0]) . $end);
        };
    }
}

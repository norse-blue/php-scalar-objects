<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringReplaceArrayExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $search, array<string|StringType> $replace): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Replace a given value in the string sequentially with an array.
         *
         * @param string|StringType $search
         * @param array<string|StringType> $replace
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($search, array $replace): StringType {
            $subject = $this;

            foreach ($replace as $value) {
                $value = self::unwrap($value);

                $subject = $subject->replaceFirst($search, $value);
            }

            return string($subject);
        };
    }
}

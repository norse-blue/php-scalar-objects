<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringRepeatExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $times = 2): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Repeat a string n times.
         *
         * @param int|IntType $times
         */
        return function ($times = 2): StringType {
            $value = $this->value;
            $times = self::unwrap($times);
            $repeated = '';

            if ($value !== '') {
                for ($i = 0; $i < $times; $i++) {
                    $repeated .= $value;
                }
            }

            return string($repeated);
        };
    }
}

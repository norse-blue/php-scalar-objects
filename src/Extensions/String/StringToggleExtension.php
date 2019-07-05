<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringToggleExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(array<string|StringType> $options, bool|BoolType $strict = false): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Toggles a string between two states.
         *
         * @param array<string|StringType> $options
         * @param bool|BoolType $strict Whether a string neither matching 1 or 2 should be changed
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function ($options, $strict = false): StringType {
            $options = array_values($options);
            foreach ($options as &$option) {
                $option = self::unwrap($option);
            }

            $index = array_search($this->value, $options, true);
            if ($index === false) {
                if (BoolType::unwrap($strict)) {
                    return string($this->value);
                }

                $index = -1;
            }

            $index++;

            return string($options[$index % count($options)]);
        };
    }
}

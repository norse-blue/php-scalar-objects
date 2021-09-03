<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringRemoveExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType|array<string|StringType> $remove): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Remove part(s) of the string.
         *
         * @param string|StringType|array<string|StringType> $remove
         */
        return function ($remove): StringType {
            $remove = self::unwrap($remove);

            $removed = is_array($remove)
                ? string(
                    @preg_replace(
                        '#(' . implode('|', $remove) . ')#',
                        '',
                        $this->value
                    ) ?? ''
                )
                : $this;

            return $removed->replace($remove, '')->trim();
        };
    }
}

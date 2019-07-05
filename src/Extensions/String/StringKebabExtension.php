<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

final class StringKebabExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to kebab case.
         *
         * @return \NorseBlue\ScalarObjects\Types\StringType
         */
        return function (): StringType {
            return $this->snake('-');
        };
    }
}

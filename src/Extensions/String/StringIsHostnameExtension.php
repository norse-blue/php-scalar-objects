<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;

final class StringIsHostnameExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a hostname.
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function (): BoolType {
            return $this->isDomain(true);
        };
    }
}

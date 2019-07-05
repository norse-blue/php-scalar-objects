<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class StringIsUrlExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $flags = FILTER_FLAG_NONE): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an url.
         *
         * @param int|IntType $flags Allowed flags:
         *                              - FILTER_FLAG_SCHEME_REQUIRED
         *                              - FILTER_FLAG_HOST_REQUIRED
         *                              - FILTER_FLAG_PATH_REQUIRED
         *                              - FILTER_FLAG_QUERY_REQUIRED
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolType {
            return bool(
                filter_var($this->value, FILTER_VALIDATE_URL, IntType::unwrap($flags)) !== false
            );
        };
    }
}

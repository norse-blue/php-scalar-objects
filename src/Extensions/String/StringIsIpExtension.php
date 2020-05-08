<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class StringIsIpExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(int|IntType $flags = FILTER_FLAG_NONE): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an IP address.
         *
         * @param int|IntType $flags Allowed flags:
         *                              - FILTER_FLAG_IPV4
         *                              - FILTER_FLAG_IPV6
         *                              - FILTER_FLAG_NO_PRIV_RANGE
         *                              - FILTER_FLAG_NO_RES_RANGE
         *
         * @see https://www.php.net/manual/en/filter.filters.validate.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolType {
            return bool(
                filter_var($this->value, FILTER_VALIDATE_IP, IntType::unwrap($flags)) !== false
            );
        };
    }
}

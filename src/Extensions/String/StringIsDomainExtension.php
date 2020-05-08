<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class StringIsDomainExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolType $is_hostname = false): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a domain.
         *
         * @param bool|BoolType $is_hostname
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($is_hostname = false): BoolType {
            return bool(
                filter_var(
                    $this->value,
                    FILTER_VALIDATE_DOMAIN,
                    BoolType::unwrap($is_hostname) ? FILTER_FLAG_HOSTNAME : FILTER_FLAG_NONE
                ) !== false
            );
        };
    }
}

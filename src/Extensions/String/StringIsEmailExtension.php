<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\bool;

final class StringIsEmailExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolType $email_unicode = false): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an email.
         *
         * @param bool|BoolType $email_unicode
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($email_unicode = false): BoolType {
            return bool(
                filter_var(
                    $this->value,
                    FILTER_VALIDATE_EMAIL,
                    BoolType::unwrap($email_unicode) ? FILTER_FLAG_EMAIL_UNICODE : FILTER_FLAG_NONE
                ) !== false
            );
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringUpperExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to upper-case.
         */
        return function (): StringType {
            $value = $this->value;

            return string(mb_strtoupper($value, 'UTF-8'));
        };
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringStudlyExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to studly caps case.
         */
        return function (): StringType {
            $value = $this->value;
            $value = ucwords(str_replace(['-', '_'], ' ', $value));

            return string(str_replace(' ', '', $value));
        };
    }
}

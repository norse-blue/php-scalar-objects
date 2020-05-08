<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

final class StringLowerCaseFirstExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Make a string's first character lowercase.
         */
        return function (): StringType {
            return $this->substr(0, 1)->lower()->concat($this->substr(1));
        };
    }
}

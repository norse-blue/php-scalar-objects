<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;

use function NorseBlue\ScalarObjects\Functions\bool;

final class BoolNotExtension extends BoolType implements ExtensionMethod
{
    /**
     * @return callable(): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Apply the NOT logical operation.
         */
        return function (): BoolType {
            return bool(! $this->value);
        };
    }
}

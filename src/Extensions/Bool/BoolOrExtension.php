<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class BoolOrExtension extends BoolType implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolType|array<bool|BoolType> ...$bools): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Apply the OR logical operation to the BoolType with the given values.
         *
         * @param bool|BoolType|array<bool|BoolType> ...$bools
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         */
        return function (...$bools): BoolType {
            if ($this->value === true) {
                return bool(true);
            }

            foreach ($bools as $bool) {
                $bool = self::unwrap($bool);

                if ($bool === true) {
                    return bool(true);
                }

                if (is_array($bool)) {
                    return bool(array_shift($bool))->or(...$bool);
                }
            }

            return bool(false);
        };
    }
}

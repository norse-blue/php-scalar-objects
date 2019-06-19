<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class BoolAndExtension extends BoolType implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolType|array<bool|BoolType> ...$bools): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Apply the AND logical operation to the BoolType with the given values.
         *
         * @param bool|BoolType|array<bool|BoolType> ...$bools
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         */
        return function (...$bools): BoolType {

            if ($this->value === false) {
                return bool(false);
            }

            foreach ($bools as $bool) {
                $bool = self::unwrap($bool);

                if ($bool === false) {
                    return bool(false);
                }

                if (is_array($bool)) {
                    return bool(array_shift($bool))->and(...$bool);
                }
            }

            return bool(true);
        };
    }
}

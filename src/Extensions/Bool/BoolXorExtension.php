<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use function NorseBlue\ScalarObjects\Functions\bool;

final class BoolXorExtension extends BoolType implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolType|array<bool|BoolType> ...$bools): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Apply the XOR logical operation to the BoolType with the given values.
         *
         * @param bool|BoolType|array<bool|BoolType> ...$bools
         *
         * @return \NorseBlue\ScalarObjects\Types\BoolType
         */
        return function (...$bools): BoolType {
            $carry = $this->value;

            foreach ($bools as $bool) {
                $bool = self::unwrap($bool);

                $carry = ($carry xor (is_array($bool) ? bool(array_shift($bool))->xor(...$bool)->value : $bool));
            }

            return bool($carry);
        };
    }
}

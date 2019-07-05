<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

final class StringExplodeExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $delimiter, int|IntType|null $limit = null): array
     */
    public function __invoke(): callable
    {
        /**
         * Explode the string into an array.
         *
         * @param string|StringType $delimiter
         * @param int|IntType|null $limit
         *
         * @return array
         */
        return function ($delimiter, $limit = PHP_INT_MAX): array {
            return explode($delimiter, $this->value, IntType::unwrap($limit));
        };
    }
}

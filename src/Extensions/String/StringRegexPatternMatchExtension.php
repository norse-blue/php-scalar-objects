<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\StringType;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\string;

final class StringRegexPatternMatchExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType|array $patterns): BoolType
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string matches at least one of the given patterns.
         *
         * @param string|StringType|array $patterns
         *
         * @return BoolType
         */
        return function ($patterns): BoolType {
            if (!is_array($patterns)) {
                $patterns = [$patterns];
            }

            foreach ($patterns as $pattern) {
                // If the given value is an exact match we can of course return true right
                // from the beginning. Otherwise, we will translate asterisks and do an
                // actual pattern match against the two strings to see if they match.
                if ($this->equals($pattern)->isTrue()) {
                    return bool(true);
                }

                // Asterisks are translated into zero-or-more regular expression wildcards
                // to make it convenient to check if the strings starts with the given
                // pattern such as "library/*", making any string check convenient.
                $pattern = string($pattern)
                    ->regexQuote('#')
                    ->replace('\*', '.*');
                if (count($this->regexMatches('#^' . $pattern . '\z#u')) > 0) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}

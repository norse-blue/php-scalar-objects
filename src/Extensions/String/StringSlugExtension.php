<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringSlugExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $separator = '-', string|StringType|null $language = 'en'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Generate a URL friendly "slug" from a given string.
         *
         * @param string|StringType $separator
         * @param string|StringType|null $language
         */
        return function ($separator = '-', $language = 'en'): StringType {
            $title = $language ? $this->ascii($language)->value : $this->value;
            $separator = self::unwrap($separator);

            // Convert all dashes/underscores into separator
            $flip = $separator === '-' ? '_' : '-';

            $title = preg_replace('![' . preg_quote($flip, '!') . ']+!u', $separator, $title) ?? '';

            // Replace @ with the word 'at'
            $title = str_replace('@', $separator . 'at' . $separator, $title);

            // Remove all characters that are not the separator, letters, numbers, or whitespace.
            $title = preg_replace(
                '![^' . preg_quote($separator, '!') . '\pL\pN\s]+!u',
                '',
                string($title)->lower()->value
            ) ?? '';

            // Replace all separator characters and whitespace by a single separator
            $title = preg_replace('![' . preg_quote($separator, '!') . '\s]+!u', $separator, $title) ?? '';

            return string(trim($title, $separator));
        };
    }
}

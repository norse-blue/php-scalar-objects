<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\ScalarObjects\Support\Character;
use NorseBlue\ScalarObjects\Types\StringType;

use function NorseBlue\ScalarObjects\Functions\string;

final class StringAsciiExtension extends StringType implements ExtensionMethod
{
    /**
     * @return callable(string|StringType $language = 'en'): StringType
     */
    public function __invoke(): callable
    {
        /**
         * Transliterate a UTF-8 value to ASCII.
         *
         * @param string|StringType $language
         */
        return function ($language = 'en'): StringType {
            $value = $this->value;
            $language = self::unwrap($language);

            $languageSpecific = Character::languageSpecificCharsArray($language);

            if ($languageSpecific !== null) {
                $value = str_replace($languageSpecific[0], $languageSpecific[1], $value);
            }

            foreach (Character::charsArray() as $key => $val) {
                $value = str_replace($val, (string)$key, $value);
            }

            return string(preg_replace('/[^\x20-\x7E]/u', '', $value) ?? '');
        };
    }
}

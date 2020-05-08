<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

/**
 * Facade to class StringType.
 *
 * @method static StringType accord(int|IntType $count, string|StringType $many, string|StringType $one, string|StringType|null $zero = null)
 * @method static StringType after(string|StringType $value, string|StringType $search)
 * @method static StringType ascii(string|StringType $value, string|StringType $language = 'en')
 * @method static StringType before(string|StringType $value, string|StringType $search)
 * @method static StringType camel(string|StringType $value)
 * @method static StringType compare(string|StringType $value, string|StringType $string, bool $case_insensitive = false)
 * @method static StringType concat(string|StringType $value, string|StringType ...$strings)
 * @method static StringType contains(string|StringType $value, string|StringType|array $needles)
 * @method static StringType create(string|StringType $value)
 * @method static StringType endsWith(string|StringType $value, string|StringType|array $needles)
 * @method static StringType equals(string|StringType $value, string|StringType $string, bool $case_insensitive = false)
 * @method static array explode(string|StringType $value, string|StringType $delimiter, int|IntType|null $limit = PHP_INT_MAX)
 * @method static StringType finish(string|StringType $value, string|StringType $cap)
 * @method static BoolType isDomain(string|StringType $value, bool|BoolType $is_hostname = false)
 * @method static BoolType isEmail(string|StringType $value, bool|BoolType $email_unicode = false)
 * @method static BoolType isHostname(string|StringType $value)
 * @method static BoolType isIp(string|StringType $value, int|IntType $flags = FILTER_FLAG_NONE)
 * @method static BoolType isMac(string|StringType $value, string|StringType $separator = null)
 * @method static BoolType isUrl(string|StringType $value, int|IntType $flags = FILTER_FLAG_NONE)
 * @method static StringType kebab(string|StringType $value)
 * @method static StringType left(string|StringType $value, int|IntType $length)
 * @method static IntType length(string|StringType $value, string|StringType $encoding = null)
 * @method static StringType limit(string|StringType $value, int $limit = 100, string|StringType $end = '...')
 * @method static StringType lowerCaseFirst(string|StringType $value)
 * @method static StringType lower(string|StringType $value)
 * @method static StringType pad(string|StringType $value, int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH)
 * @method static StringType padLeft(string|StringType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method static StringType padRight(string|StringType $value, int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method static StringType prefix(string|StringType $value, string|StringType $prefix)
 * @method static StringType random(int $length = 16)
 * @method static StringType remove(string|StringType $value, string|StringType|array<string|StringType> $remove)
 * @method static StringType repeat(string|StringType $value, int|IntType $times = 2)
 * @method static StringType replace(string|StringType $value, string|StringType $search, string|StringType $replace)
 * @method static StringType replaceArray(string|StringType $value, string|StringType $search, array<string|StringType> $replace)
 * @method static StringType replaceFirst(string|StringType $value, string|StringType $search, string|StringType $replace)
 * @method static StringType replaceLast(string|StringType $value, string|StringType $search, string|StringType $replace)
 * @method static StringType right(string|StringType $value, int|IntType $length)
 * @method static StringType slug(string|StringType $value, string|StringType $separator = '-', string|StringType|null $language = 'en')
 * @method static StringType snake(string|StringType $value, string|StringType $delimiter = '_')
 * @method static StringType start(string|StringType $value, string|StringType $prefix)
 * @method static StringType startsWith(string|StringType $value, string|StringType|array $needles)
 * @method static StringType studly(string|StringType $value)
 * @method static StringType substr(string|StringType $value, int $start, int|null $length = null)
 * @method static StringType suffix(string|StringType $value, string|StringType $suffix)
 * @method static StringType surround(string|StringType $value, string|StringType $prefix, string|StringType|null $suffix = null)
 * @method static StringType title(string|StringType $value)
 * @method static StringType toggle(string|StringType $value, array<string|StringType> $options, bool|BoolType $strict = false)
 * @method static StringType trim(string|StringType $value, string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method static StringType trimLeft(string|StringType $value, string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method static StringType trimRight(string|StringType $value, string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method static StringType upperCaseFirst(string|StringType $value)
 * @method static StringType upper(string|StringType $value)
 * @method static StringType words(string|StringType $value, int $words = 100, string|StringType $end = '...')
 */
final class StringFacade extends BaseFacade
{
    protected static string $target_class = StringType::class;
}

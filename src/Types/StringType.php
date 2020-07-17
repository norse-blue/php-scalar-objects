<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Types;

use ArrayAccess;
use Countable;
use NorseBlue\ScalarObjects\PrimitiveType;
use NorseBlue\ScalarObjects\Traits\String\StringArrayAccess;
use NorseBlue\ScalarObjects\Traits\String\StringCheckMethods;
use NorseBlue\ScalarObjects\Traits\String\StringCountable;
use NorseBlue\ScalarObjects\Traits\String\StringStaticMethods;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\int;

/**
 * String type as object.
 *
 * @property string $value
 *
 * @method self after(string|self $search)
 * @method self ascii(string|self $language = 'en')
 * @method self before(string|self $search)
 * @method self camel()
 * @method self concat(string|self ...$strings)
 * @method BoolType contains(string|self|array $needles)
 * @method BoolType endsWith(string|self|array $needles)
 * @method array explode(string|StringType $delimiter, int|IntType|null $limit = PHP_INT_MAX)
 * @method self finish(string|self $cap)
 * @method BoolType isDomain(bool|BoolType $is_hostname = false)
 * @method BoolType isEmail(bool|BoolType $email_unicode = false)
 * @method BoolType isHostname()
 * @method BoolType isIp(int|IntType $flags = FILTER_FLAG_NONE)
 * @method BoolType isMac(string|StringType $separator = null)
 * @method BoolType isUrl(int|IntType $flags = FILTER_FLAG_NONE)
 * @method self kebab()
 * @method self left(int|IntType $length)
 * @method IntType length(string|self $encoding = null)
 * @method self limit(int $limit = 100, string|self $end = '...')
 * @method self lowerCaseFirst()
 * @method self lower()
 * @method self pad(int|IntType $pad_length, string|StringType $pad_string = '0', int|IntType $pad_side = STR_PAD_BOTH)
 * @method self padLeft(int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method self padRight(int|IntType $pad_length, string|StringType $pad_string = '0')
 * @method self prefix(string|StringType $prefix)
 * @method self remove(string|StringType|array<string|StringType> $remove)
 * @method self repeat(int|IntType $times = 2)
 * @method self replace(string|StringType $search, string|StringType $replace)
 * @method self replaceArray(string|self $search, array<string|self> $replace)
 * @method self replaceFirst(string|self $search, string|self $replace)
 * @method self replaceLast(string|self $search, string|self $replace)
 * @method self right(int|IntType $length)
 * @method self slug(string|self $separator = '-', string|self|null $language = 'en')
 * @method self snake(string|self $delimiter = '_')
 * @method self start(string|self $prefix)
 * @method BoolType startsWith(string|self|array $needles)
 * @method self studly()
 * @method self substr(int $start, int|null $length = null)
 * @method self suffix(string|StringType $suffix)
 * @method self surround(string|StringType $prefix, string|StringType|null $suffix = null)
 * @method self title()
 * @method self toggle(array<string|StringType> $options, bool|BoolType $strict = false)
 * @method self trim(string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method self trimLeft(string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method self trimRight(string|StringType $character_mask = " \t\n\r\0\x0B")
 * @method self upperCaseFirst()
 * @method self upper()
 * @method self words(int $words = 100, string|self $end = '...')
 *
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringAfterExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringAsciiExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringBeforeExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringCamelExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringCompareExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringConcatExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringContainsExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringEndsWithExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringEqualsExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringExplodeExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringFinishExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsDomainExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsEmailExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsHostnameExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsIpExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsMacExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringIsUrlExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringKebabExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLeftExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLengthExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLimitExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLowerCaseFirstExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLowerExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringPadExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringPadLeftExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringPadRightExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringPrefixExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringRemoveExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringRepeatExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringReplaceExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringReplaceArrayExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringReplaceFirstExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringReplaceLastExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringLeftExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringSlugExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringSnakeExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringStartExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringStartsWithExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringStudlyExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringSubstrExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringSuffixExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringSurroundExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringTitleExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringToggleExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringTrimExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringTrimLeftExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringTrimRightExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringUpperCaseFirstExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringUpperExtension
 * @see \NorseBlue\ScalarObjects\Extensions\String\StringWordsExtension
 *
 * @implements ArrayAccess<int, string>
 */
class StringType extends PrimitiveType implements ArrayAccess, Countable
{
    use StringArrayAccess;
    use StringCheckMethods;
    use StringCountable;
    use StringStaticMethods;

    /**
     * Create a new instance.
     *
     * @param string|StringType $value
     */
    public function __construct($value = '')
    {
        if (! $this->isValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        parent::__construct((string) self::unwrap($value));
    }

    /**
     * Compare the object against a given value.
     *
     * @param string|StringType $string
     * @param bool|BoolType $case_insensitive
     */
    final public function compare($string, $case_insensitive = false): IntType
    {
        $value = $this->value;
        $string = self::unwrap($string);
        $case_insensitive = bool($case_insensitive);

        return int($case_insensitive->isTrue() ? strcasecmp($value, $string) : strcmp($value, $string));
    }

    /**
     * {@inheritdoc}
     */
    final public function equals($other, bool $case_insensitive = false): BoolType
    {
        if (is_object($other) && ! $other instanceof self) {
            return bool(false);
        }

        return $this->compare($other, $case_insensitive)->equals(0);
    }
}

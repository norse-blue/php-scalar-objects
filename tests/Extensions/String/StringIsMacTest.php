<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use Exception;
use NorseBlue\ScalarObjects\Exceptions\String\MacSeparatorLengthException;
use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

/**
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/055.phpt
 */
class StringIsMacTest extends TestCase
{
    /** @test */
    public function string_is_mac()
    {
        $this->assertTrue(Str::isMac('01-23-45-67-89-ab')->value);
        $this->assertTrue(Str::isMac('01-23-45-67-89-ab', '-')->value);
        $this->assertFalse(Str::isMac('01-23-45-67-89-ab', '.')->value);
        $this->assertFalse(Str::isMac('01-23-45-67-89-ab', ':')->value);
        $this->assertTrue(Str::isMac('01-23-45-67-89-AB')->value);
        $this->assertTrue(Str::isMac('01-23-45-67-89-aB')->value);
        $this->assertTrue(Str::isMac('01:23:45:67:89:ab')->value);
        $this->assertTrue(Str::isMac('01:23:45:67:89:AB')->value);
        $this->assertTrue(Str::isMac('01:23:45:67:89:aB')->value);
        $this->assertFalse(Str::isMac('01:23:45-67:89:aB')->value);
        $this->assertFalse(Str::isMac('xx:23:45:67:89:aB')->value);
        $this->assertTrue(Str::isMac('0123.4567.89ab')->value);
    }

    /** @test */
    public function string_is_mac_throws_exception_when_separator_more_than_one_character_long()
    {
        try {
            $this->assertFalse(Str::isMac('01-23-45-67-89-ab', '--')->value);
        } catch (Exception $e) {
            $this->assertInstanceOf(MacSeparatorLengthException::class, $e);

            return;
        }

        $this->fail(MacSeparatorLengthException::class . ' was not thrown.');
    }

    /** @test */
    public function string_is_mac_throws_exception_when_separator_less_than_one_character_long()
    {
        try {
            $this->assertFalse(Str::isMac('01-23-45-67-89-ab', '')->value);
        } catch (Exception $e) {
            $this->assertInstanceOf(MacSeparatorLengthException::class, $e);

            return;
        }

        $this->fail(MacSeparatorLengthException::class . ' was not thrown.');
    }
}

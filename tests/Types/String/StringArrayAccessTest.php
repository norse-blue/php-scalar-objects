<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\String;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;
use NorseBlue\ValueObjects\Exceptions\ImmutableValueObjectException;
use OutOfBoundsException;

class StringArrayAccessTest extends TestCase
{
    /** @test */
    public function can_get_string_offset()
    {
        $subject = new StringType('abcde');

        $this->assertEquals('c', $subject[2]);
    }

    /** @test */
    public function throws_exception_when_trying_to_get_an_invalid_string_offset()
    {
        $subject = new StringType('abcde');

        try {
            $subject[9];
        } catch (Exception $e) {
            $this->assertInstanceOf(OutOfBoundsException::class, $e);

            return;
        }

        $this->fail(OutOfBoundsException::class . ' was not thrown');
    }

    /** @test */
    public function throws_exception_when_trying_to_set_string_offset()
    {
        $subject = new StringType('abcde');

        try {
            $subject[2] = '*';
        } catch (Exception $e) {
            $this->assertInstanceOf(ImmutableValueObjectException::class, $e);

            return;
        }

        $this->fail(ImmutableValueObjectException::class . ' was not thrown');
    }

    /** @test */
    public function throws_exception_when_trying_to_unset_string_offset()
    {
        $subject = new StringType('abcde');

        try {
            unset($subject[2]);
        } catch (Exception $e) {
            $this->assertInstanceOf(ImmutableValueObjectException::class, $e);

            return;
        }

        $this->fail(ImmutableValueObjectException::class . ' was not thrown');
    }
}

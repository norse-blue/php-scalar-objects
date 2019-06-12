<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\String;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

class CreateTypeTest extends TestCase
{
    /** @test */
    public function string_is_created_with_default_value()
    {
        $subject = new StringType();

        $this->assertEquals('', $subject->value);
    }

    /** @test */
    public function string_is_created_with_given_value()
    {
        $subject = new StringType('the value');

        $this->assertEquals('the value', $subject->value);
    }

    /** @test */
    public function string_is_created_with_given_string_object_value()
    {
        $object = new StringType('the value');

        $subject = new StringType($object);

        $this->assertEquals('the value', $subject->value);
    }

    /** @test */
    public function string_cannot_be_created_using_invalid_value()
    {
        try {
            $subject = new StringType(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}

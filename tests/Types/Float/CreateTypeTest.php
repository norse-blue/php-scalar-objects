<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Float;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

class CreateTypeTest extends TestCase
{
    /** @test */
    public function float_is_created_with_default_value()
    {
        $subject = new FloatType();

        $this->assertEquals(0.0, $subject->value);
    }

    /** @test */
    public function float_is_created_with_given_value()
    {
        $subject = new FloatType(3.9);

        $this->assertEquals(3.9, $subject->value);
    }

    /** @test */
    public function float_is_created_with_given_float_object_value()
    {
        $object = new FloatType(3.9);

        $subject = new FloatType($object);

        $this->assertEquals(3.9, $subject->value);
    }

    /** @test */
    public function float_cannot_be_created_using_invalid_value()
    {
        try {
            $subject = new FloatType('invalid');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}

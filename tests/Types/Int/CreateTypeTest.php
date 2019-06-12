<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Int;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

class CreateTypeTest extends TestCase
{
    /** @test */
    public function int_is_created_with_default_value()
    {
        $subject = new IntType();

        $this->assertEquals(0, $subject->value);
    }

    /** @test */
    public function int_is_created_with_given_value()
    {
        $subject = new IntType(3);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function int_is_created_with_given_int_object_value()
    {
        $object = new IntType(3);

        $subject = new IntType($object);

        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function int_cannot_be_created_using_invalid_value()
    {
        try {
            $subject = new IntType('invalid');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}

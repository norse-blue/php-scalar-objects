<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Number;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

class CreateTypeTest extends TestCase
{
    /** @test */
    public function number_is_created_with_default_value()
    {
        $subject = new NumberType();

        $this->assertEquals(0, $subject->value);
        $this->assertTrue($subject->isInt()->value);
        $this->assertFalse($subject->isFloat()->value);
    }

    /** @test */
    public function number_is_created_with_given_value()
    {
        $subject_int = new NumberType(3);
        $subject_float = new NumberType(3.9);

        $this->assertEquals(3, $subject_int->value);
        $this->assertEquals(3.9, $subject_float->value);

        $this->assertTrue($subject_int->isInt()->value);
        $this->assertFalse($subject_int->isFloat()->value);

        $this->assertFalse($subject_float->isInt()->value);
        $this->assertTrue($subject_float->isFloat()->value);
    }

    /** @test */
    public function number_is_created_with_given_int_object_value()
    {
        $object_int = new IntType(3);
        $object_float = new FloatType(3.9);

        $subject_int = new NumberType($object_int);
        $subject_float = new NumberType($object_float);

        $this->assertEquals(3, $subject_int->value);
        $this->assertEquals(3.9, $subject_float->value);

        $this->assertTrue($subject_int->isInt()->value);
        $this->assertFalse($subject_int->isFloat()->value);

        $this->assertFalse($subject_float->isInt()->value);
        $this->assertTrue($subject_float->isFloat()->value);
    }

    /** @test */
    public function number_cannot_be_created_using_invalid_value()
    {
        try {
            $subject = new NumberType('invalid');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}

<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Functions;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use function NorseBlue\ScalarObjects\Functions\bool;
use function NorseBlue\ScalarObjects\Functions\float;
use function NorseBlue\ScalarObjects\Functions\int;
use function NorseBlue\ScalarObjects\Functions\number;
use function NorseBlue\ScalarObjects\Functions\string;
use NorseBlue\ScalarObjects\Types\StringType;

class CreateTypeObjectsTest extends TestCase
{
    /** @test */
    public function bool_type_object_is_created_using_function_with_default_value()
    {
        $subject = bool();

        $this->assertInstanceOf(BoolType::class, $subject);
        $this->assertEquals(false, $subject->value);
    }

    /** @test */
    public function bool_type_object_is_created_using_function_with_given_value()
    {
        $subject = bool(true);

        $this->assertInstanceOf(BoolType::class, $subject);
        $this->assertEquals(true, $subject->value);
    }

    /** @test */
    public function float_type_object_is_created_using_function_with_default_value()
    {
        $subject = float();

        $this->assertInstanceOf(FloatType::class, $subject);
        $this->assertEquals(0.0, $subject->value);
    }

    /** @test */
    public function float_type_object_is_created_using_function_with_given_value()
    {
        $subject = float(3.9);

        $this->assertInstanceOf(FloatType::class, $subject);
        $this->assertEquals(3.9, $subject->value);
    }

    /** @test */
    public function int_type_object_is_created_using_function_with_default_value()
    {
        $subject = int();

        $this->assertInstanceOf(IntType::class, $subject);
        $this->assertEquals(0, $subject->value);
    }

    /** @test */
    public function int_type_object_is_created_using_function_with_given_value()
    {
        $subject = int(3);

        $this->assertInstanceOf(IntType::class, $subject);
        $this->assertEquals(3, $subject->value);
    }

    /** @test */
    public function numeric_type_object_is_created_using_function_with_default_value()
    {
        $subject = number();

        $this->assertInstanceOf(NumberType::class, $subject);
        $this->assertInstanceOf(IntType::class, $subject);
        $this->assertEquals(0, $subject->value);
    }

    /** @test */
    public function numeric_type_object_is_created_using_function_with_given_value()
    {
        $subject_int = number(3);
        $subject_float = number(3.9);

        $this->assertInstanceOf(NumberType::class, $subject_int);
        $this->assertInstanceOf(NumberType::class, $subject_float);
        $this->assertInstanceOf(IntType::class, $subject_int);
        $this->assertInstanceOf(FloatType::class, $subject_float);
        $this->assertEquals(3, $subject_int->value);
        $this->assertEquals(3.9, $subject_float->value);
    }

    /** @test */
    public function string_type_object_is_created_using_function_with_default_value()
    {
        $subject = string();

        $this->assertInstanceOf(StringType::class, $subject);
        $this->assertEquals('', $subject->value);
    }

    /** @test */
    public function string_type_object_is_created_using_function_with_given_value()
    {
        $subject = string('the value');

        $this->assertInstanceOf(StringType::class, $subject);
        $this->assertEquals('the value', $subject->value);
    }
}
